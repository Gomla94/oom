<?php

namespace App\Http\Controllers\Admin;

use App\Models\Grade;
use Illuminate\Http\Request;
use App\Models\Grade as Model;
use App\Helpers\Classes\Helper;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class GradesController extends Controller
{

    protected $data = 
    [
        'route'     => 'grades',
        'elements'  => 'grades',
        'element'   => 'grade',
        'view'      => 'grades',
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
        
        return view('admin.' . $this->data['view'] . '.create')->with($this->data);
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
        return view('admin.' . $this->data['view'] . '.edit', compact('item'))->with($this->data);
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
        $item->delete();
        return Helper::redirect($request->new, $this->data['route']);
    }
}
