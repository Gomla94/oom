<?php

namespace App\Http\Controllers\WebController;
use App\Models\Month;
use App\Models\Group;
use Illuminate\Support\Facades\Auth;
use App\Models\SubscriptionRequest;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;



class HomeController extends Controller
{
    public $data = [
            'view'          => 'months',
            'route'         => 'months',
            'itemname'      => 'شهر',
            'itemsnames'    => 'الشهور',
        ];
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stu_group_id  = Auth::user()->group_id;
    //    $items         = Month::with('subscriptions')->where(->get();
  
        $grade_id      = Group::where('id',$stu_group_id )->pluck('grade_id');
        $grade_id      = $grade_id[0];
     //   $items         = Month::whereHas('lessons')->where('grade_id',$grade_id)->get();
        $items =     Month::query()->whereHas('lessons')->where('grade_id',$grade_id)
        ->with(['subscriptions' => function ($query) {
            $query->where('student_id', Auth::user()->id);
        }])
        ->get();
   

        return view('website.index', compact('items'))->with($this->data);;
      
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
            return back()->withErrors("تم الإشتراك مسبقا في نفس الشهر");

        if($validate->fails())
        {
            return back()->withErrors("البيانات المدخلة غير صحيحة");
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
        
        return back()->with('success', 'تم الإشتراك بنجاح, سيصلك إشعار فور تفعيل إشتراكك');
    }

    /* public function loginPage(){
        if (! auth()->guard('AdminGuard')->check()) {
            return view('admin.login');
        }else{
            return redirect('admin');
        }
    } */

   /*  public function loginSubmit(Request $request){

        $credintails = $request->only('email', 'password');
        if(Auth::guard('AdminGuard')->attempt($credintails)){
           // return redirect('admin');
            return redirect()->intended('admin');
        }else{
            return back()->withErrors('Something Wrong In Your Credentials');
        }
    } */

   
}
