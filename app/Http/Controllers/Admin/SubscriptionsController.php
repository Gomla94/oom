<?php

namespace App\Http\Controllers\Admin;

use App\Models\Grade;
use App\Models\Month;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Helpers\Classes\Helper;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\SubscriptionRequest as Model;

class SubscriptionsController extends Controller
{

    protected $data = 
    [
        'route'     => 'subscriptions',
        'elements'  => 'subscriptions',
        'element'   => 'subscription',
        'view'      => 'subscriptions',
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
        $students   = Student::pluck('name', 'id')->prepend(Helper::admin_trans('choose'), 0);
        $months     = Month::pluck('title', 'id')->prepend(Helper::admin_trans('choose'), 0);
        return view('admin.' . $this->data['view'] . '.create', compact('students', 'months'))->with($this->data);
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
            'student_id'        => 'required|exists:students,id',
            'month_id'          => 'required|exists:months,id',
            'payment_method'    => 'required|in:1,2',
            'attachement_file'  => 'nullable|image'
        ]);

        $student_months = Student::find($request->student_id)->months();
        
        if(in_array($request->month_id, $student_months->pluck('month_id')->toArray()))
            return back()->withErrors("الطالب مشترك مسبقا في نفس الشهر مسبقا");

        if($request->hasFile('attachement_file'))
        {
            $request['attachement']     = $request->file('attachement_file')->store('subscription_attachements');
        }

        $request['payment_status']  = (boolean) $request->payment_status;
        $request['viewed_status']   = true;
 
        $student_months->attach($request->month_id);

        Model::create($request->all());

        return Helper::redirect($request->new, $this->data['route']);
    }

    public function show($id)
    {
        $item       = Model::findOrFail($id);
        $item->update(['viewed_status' => true]);
        return view('admin.' . $this->data['view'] . '.show', compact('item'))->with($this->data);
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
        $item->update(['viewed_status' => true]);
        $students   = Student::pluck('name', 'id')->prepend(Helper::admin_trans('choose'), 0);
        $months     = Month::pluck('title', 'id')->prepend(Helper::admin_trans('choose'), 0);
        return view('admin.' . $this->data['view'] . '.edit', compact('item', 'students', 'months'))->with($this->data);
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
            'student_id'        => 'required|exists:students,id',
            'month_id'          => 'required|exists:months,id',
            'payment_method'    => 'required|in:1,2',
            'attachement_file'  => 'nullable|image'
        ]);

        
        if($request->hasFile('attachement_file'))
        {
            Storage::delete($item->attachement);
            $request['attachement']     = $request->file('attachement_file')->store('subscription_attachements');
        }
        
        $request['payment_status']  = (boolean) $request->payment_status;


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
        Student::find($item->student_id)->months()->detach();
        Storage::delete($item->attachement);
        $item->delete();
        return Helper::redirect($request->new, $this->data['route']);
    }
}
