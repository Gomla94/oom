<?php

namespace App\Http\Controllers\Admin;

use App\Models\Grade;
use Illuminate\Http\Request;
use App\Models\Group as Model;
use App\Helpers\Classes\Helper;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class GroupsController extends Controller
{

    protected $data = 
    [
        'route'     => 'groups',
        'elements'  => 'groups',
        'element'   => 'group',
        'view'      => 'groups',
<<<<<<< HEAD
        'students_attendaces' => 'student_attendances'
=======
>>>>>>> 4d69eea47646efb4522a0e57cd237320134c7a7c
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
        $grades = Grade::pluck('title', 'id')->prepend(Helper::admin_trans('choose'), 0);
        return view('admin.' . $this->data['view'] . '.create', compact('grades'))->with($this->data);
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
            'title'             => 'required',
            'grade_id'          => 'required|exists:grades,id'
        ]);

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
        $item = Model::findOrFail($id);
        $grades = Grade::pluck('title', 'id')->prepend(Helper::admin_trans('choose'), 0);
        return view('admin.' . $this->data['view'] . '.edit', compact('item', 'grades'))->with($this->data);
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
            'title'             => 'required',
            'grade_id'          => 'required|exists:grades,id'
        ]);

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
        $item->students()->update(['group_id' => null]);
        $item->delete();
        return Helper::redirect($request->new, $this->data['route']);
    }

    public function attendances(Model $group)
    {
        $group_attendacnes = $group->attendances()->get();
        return view('admin.' . $this->data['view'] . '.attendances', compact('group_attendacnes', 'group'))->with($this->data);
    }
}
