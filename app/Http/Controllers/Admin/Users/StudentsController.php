<?php

namespace App\Http\Controllers\Admin\Users;

use App\Models\Grade;
use App\Models\Group;
use Illuminate\Http\Request;
use App\Helpers\Classes\Helper;
use App\Models\Student as Model;
use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;
use DB;
class StudentsController extends Controller
{

    protected $data =
    [
        'route'     => 'users.students',
        'elements'  => 'students',
        'element'   => 'student',
        'view'      => 'users.students',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Model::orderBy('id', 'DESC')->get();
        return view('admin.' . $this->data['view'] . '.index', compact('items'))->with($this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = Group::get()->pluck('title_and_grade', 'id')->prepend(Helper::admin_trans('choose'), 0);
        return view('admin.' . $this->data['view'] . '.create', compact('groups'))->with($this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
        [
            'name'              => 'required',
            'email'             => 'required|email|unique:students,email',
            'password'          => 'required|min:6|max:191',
            'phone'             => 'required|unique:students,phone|min:5|max:191',
            'address'           => 'required|min:3|max:191',
            'group_id'          => 'required|exists:groups,id'
        ]);

        $request['password']    = Hash::make($request->password);
        $request['status']      = (boolean) $request->status;

        Model::create($request->all());

        return Helper::redirect($request->new, $this->data['route']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item   = Model::findOrFail($id);
        $groups = Group::get()->pluck('title_and_grade', 'id')->prepend(Helper::admin_trans('choose'), 0);
        return view('admin.' . $this->data['view'] . '.edit', compact('item', 'groups'))->with($this->data);
    }

    public function show($id)
    {
        $item   = Model::findOrFail($id);
        return view('admin.' . $this->data['view'] . '.show', compact('item'))->with($this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = Model::findOrFail($id);

        $request->validate(
        [
            'name'              => 'required',
            'email'             => 'required|email|unique:students,email,' . $item->id,
            'password'          => 'nullable|min:6|max:191',
            'phone'             => 'required|min:5|max:191|unique:students,phone,' . $item->id,
            'parent_phone_number'  => 'sometimes|nullable|min:5|max:191|unique:students,parent_phone_number,' . $item->id,
            'address'           => 'required|min:3|max:191',
            'group_id'          => 'required|exists:groups,id'
        ]);

        $request['password']    = $request->password ? Hash::make($request->password) : $item->password;
        $request['status']      = (boolean) $request->status;
        
        if($request['status'] == 0)
        {
            DB::table('oauth_access_tokens')->where('user_id', $id)->delete();
        }

        $item->update($request->all());

        return Helper::redirect($request->new, $this->data['route']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Request $request, $id)
    {
        $item = Model::findOrFail($id);
        $item->months()->detach();
        $item->alerts()->detach();
        $item->subscriptions()->delete();
        $item->devices()->delete();
        $item->chat()->delete();
        $item->FCM_tokens()->delete();
        $item->delete();
        return Helper::redirect($request->new, $this->data['route']);
    }
    public function deleteAll()
    {
        Model::truncate();
        return Helper::redirect($request->new, $this->data['route']);
    }

    public function get_qrcode(Model $student)
    {
        $output = view('admin.' . $this->data['view'] . '.student_card')->with('student', $student)->render();

        print_r($output);
        return ('<script>window.print()</script>');
    }

    public function get_attendances(Model $student)
    {
        $student_attendances = $student->student_attendances()->with(['grade', 'group'])->get();
        return view('admin.' . $this->data['view'] . '.attendances_parents', compact('student_attendances'))->with($this->data);
    }

    public function print_cards()
    {
        $students = Student::paginate(10);
        return view('admin.' . $this->data['view'] . '.print_cards', compact('students'))->with($this->data);
    }
}
