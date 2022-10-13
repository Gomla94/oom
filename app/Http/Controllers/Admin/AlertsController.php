<?php

namespace App\Http\Controllers\Admin;

use App\Events\PushNotifications;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\Alert as Model;
use App\Helpers\Classes\Helper;
use App\Http\Controllers\Controller;
use App\Models\FcmToken;


class AlertsController extends Controller
{
    protected $data =
    [
        'route'     => 'alerts',
        'elements'  => 'alerts',
        'element'   => 'alert',
        'view'      => 'alerts'
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Model::get();
        return view('admin.' . $this->data['view'] . '.index', compact('items'))->with($this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = Student::pluck('name', 'id');
        return view('admin.' . $this->data['view'] . '.create', compact('students'))->with($this->data);
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
            'students_id'       => 'required',
            'students_id.*'     => 'required|exists:students,id',
            'title'             => 'required|max:191',
            'details'           => 'required|min:1',
        ]);

        $item = Model::create($request->all());



        $item->students()->attach($request->students_id);

         
        $tokens     = FcmToken::whereIn('student_id', $item->students->pluck('id'))->pluck('token')->toArray();
      // return $tokens;
        event(new PushNotifications($item->students, $request->title, $request->details, $tokens));

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
        $item       = Model::findOrFail($id);
        $students   = Student::pluck('name', 'id');
        return view('admin.' . $this->data['view'] . '.edit', compact('item', 'students'))->with($this->data);
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
            'students_id'       => 'required',
            'students_id.*'     => 'required|exists:grades,id',
            'title'             => 'required|max:191',
            'details'           => 'required|min:1',
        ],
        [
            'students_id.required'      => 'يجب إختيار طالب أول أكثر'
        ]);

        $item->update($request->all());

        $item->students()->sync($request->students_id);

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
        $item->students()->detach();
        $item->delete();
        return Helper::redirect($request->new, $this->data['route']);
    }
}
