<?php

namespace App\Http\Controllers\Admin;

use App\Models\Grade;
use Illuminate\Http\Request;
use App\Models\Month as Model;
use App\Helpers\Classes\Helper;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
class MonthsController extends Controller
{

    protected $data =
    [
        'route'     => 'months',
        'elements'  => 'months',
        'element'   => 'month',
        'view'      => 'months',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //  $items = Model::orderBy('grade_id', 'ASC')->get();
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
            'title'             => 'required|max:191',
            'price'             => 'required|numeric',
            'grade_id'          => 'required|exists:grades,id',
            'start_date'        => 'required|date',
            'end_date'          => 'required|date',
            'image'             => 'required',
            'image.*'           => 'image',
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
        $item   = Model::findOrFail($id);
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
            'title'             => 'required|min:6|max:191',
            'price'             => 'required|numeric',
            'grade_id'          => 'required|exists:grades,id',
            'start_date'        => 'required|date',
            'end_date'          => 'required|date',
            'image'             => 'nullable',
            'image.*'           => 'image'
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
        Storage::delete($item->image);
        $item->subscriptions()->delete();
        $item->students()->detach();
        $item->delete();
        return Helper::redirect($request->new, $this->data['route']);
    }
}
