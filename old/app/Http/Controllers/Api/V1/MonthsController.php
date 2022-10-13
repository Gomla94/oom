<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Month;
use App\Models\Group;
use App\Models\SubscriptionRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Api\V1\MonthsResource;
use App\Http\Controllers\Api\V1\BaseController;
use Illuminate\Support\Facades\Validator;

class MonthsController extends BaseController
{
    public function available()
    {
        $stu_group_id  = Auth::user()->group_id;
        $grade_id      = Group::where('id',$stu_group_id )->pluck('grade_id');
        $grade_id      = $grade_id[0];
        $months        = Month::whereHas('lessons')->where('grade_id',$grade_id)->get();
      
        return $this->response(MonthsResource::collection($months),'Months fetched successfully');
    }
    
    
    public function user_month()
    {
         $stu_id  = Auth::user()->id;
         
         
        // $month   = Month::get();
            $subscribe     = SubscriptionRequest::where('student_id', $stu_id)->select('id', 'month_id', 'payment_status')->get();
         
       
    
        return $this->response($subscribe,'Months fetched successfully');
    }

    public function subscribe(Request $request)
    {
        $validate = Validator::make($request->all(),
        [
            'month_id'          => 'required|exists:months,id|in:' . implode(',', json_decode(Month::whereHas('lessons')->pluck('id'), true)),
            'payment_method'    => 'required|in:1,2',
            'attachement_file'  => 'required_unless:payment_method,1|image'
        ],
        [
            'month_id.in'                       => 'الشهر المطلوب غير متاح',
            'attachement_file.required_unless'  => 'صورة الفاتورة مطلوبة لتاكيد الدفع'
        ]);


        $student_months = Auth::user()->months();
        if(in_array($request->month_id, $student_months->pluck('month_id')->toArray()))
            return $this->error("تم الإشتراك مسبقا في نفس الشهر");

        if($validate->fails())
        {
            return $this->error("البيانات المدخلة غير صحيحة", $validate->errors(), 422);
        }

        $data = $request->all();

        if($request->hasFile('attachement_file'))
        {
            $data['attachement']     = $request->file('attachement_file')->store('subscription_attachements');
        }

        // $data['attachement']     = $request->file('attachement_file')->store('subscription_attachements', 'public');

        Auth::user()->subscriptions()->create($data);
        $month = Month::findOrFail($request->month_id);
        Auth::user()->months()->attach($month);

        return $this->response([], 'تم الإشتراك بنجاح, سيصلك إشعار فور تفعيل إشتراكك');
    }
}
