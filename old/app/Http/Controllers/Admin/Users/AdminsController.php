<?php

namespace App\Http\Controllers\Admin\Users;

use Illuminate\Http\Request;
use App\Models\Admin as Model;
use App\Helpers\Classes\Helper;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminsController extends Controller
{

    protected $data =
    [
        'route'     => 'users.admins',
        'elements'  => 'admins',
        'element'   => 'admin',
        'view'      => 'users.admins',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Model::where('id', '!=', Helper::admin_user()->id)->get();
        return view('admin.' . $this->data['view'] . '.index', compact('items'))->with($this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::get()->pluck('name', 'id');
        return view('admin.' . $this->data['view'] . '.create', compact('roles'))->with($this->data);
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
            'name'              => 'required|regex:/^[A-Za-z_-]+$/|unique:admins,name',
            'email'             => 'required|email|unique:admins,email',
            'password'          => 'required|min:6|max:191',
            'roles.*'           => 'required|exists:roles,id'
        ]);

        $item = Model::create($request->all());

        $item->roles()->attach($request->roles);

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
        $roles = Role::get()->pluck('name', 'id');
        return view('admin.' . $this->data['view'] . '.edit', compact('item', 'roles'))->with($this->data);
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
            'name'              => 'required|regex:/^[A-Za-z_-]+$/|unique:admins,name,' . $item->id,
            'email'             => 'required|email|unique:admins,email,' . $item->id,
            'password'          => 'nullable|min:6|max:191',
            'roles.*'           => 'required|exists:roles,id'
        ]);

        $item->update($request->all());

        $item->roles()->sync($request->roles);

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
        $item->roles()->detach();
        $item->delete();
        return Helper::redirect($request->new, $this->data['route']);
    }
}
