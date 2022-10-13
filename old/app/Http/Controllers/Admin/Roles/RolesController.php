<?php

namespace App\Http\Controllers\Admin\Roles;

use Illuminate\Http\Request;
use App\Helpers\Classes\Helper;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role as Model;

class RolesController extends Controller
{
    protected $data =
    [
        'route'     => 'roles_permissions.roles',
        'elements'  => 'roles',
        'element'   => 'role',
        'view'      => 'roles.roles',
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
        $permissions = Permission::get()->pluck('name', 'id');
        return view('admin.' . $this->data['view'] . '.create', compact('permissions'))->with($this->data);
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
            'name'              => 'required|regex:/^[A-Za-z_-]+$/|unique:' . $this->data['elements'] . ',name',
            'permissions.*'     => 'required|exists:permissions,id'
        ]);

        $request['guard_name'] = 'admin';

        $item = Model::create($request->all());

        $item->permissions()->sync($request->permissions);

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
        $permissions = Permission::get()->pluck('name', 'id');
        return view('admin.' . $this->data['view'] . '.edit', compact('item', 'permissions'))->with($this->data);
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
            'name'             => 'required|regex:/^[A-Za-z_-]+$/|unique:' . $this->data['elements'] . ',name,' . $item->id,
            'permissions.*'     => 'required|exists:permissions,id'
        ]);

        $item->update($request->all());
        $item->permissions()->sync($request->permissions);

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
        Model::findOrFail($id)->delete();
        return Helper::redirect($request->new, $this->data['route']);
    }
}
