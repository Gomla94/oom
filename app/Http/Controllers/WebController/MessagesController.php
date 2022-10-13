<?php

namespace App\Http\Controllers\WebController;
use App\Models\Month;
use App\Models\Group;
use App\Models\Grade;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use App\Models\SubscriptionRequest;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;



class MessagesController extends Controller
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
        $group_id =  Auth::user()->group_id;
        $group = Group::select('grade_id', 'title')->findOrFail($group_id);
        $gradeee = Grade::findOrFail($group->grade_id);
      //  $aut = Auth::user();
        return view('website.user_profile', compact('gradeee','group'))->with($this->data);
    }

    public function submitPassword(Request $request)
    {

        if($request->password != null){

            $current_password       = auth()->user()->password;
            $old                    = $request->old;
            $password               = bcrypt($request->password);
            
                $data = $this->validate($request,[
                    'password'              => 'required|string|min:6|confirmed',
                    'password_confirmation' => 'required'
                ]);


            if(Hash::check($old, $current_password))
                {
                    User::where('id', auth()->user()->id)->update(['password'=>$password]);
                }
            else{
                    return back()->withErrors([ 'كلمة المرور غير متطابقة']);
                }

        }
     

       return redirect('/')->withSuccess('تم التعديل');
    }


    public function chat()
    {
       $chat = Auth::user()->chat()->first();
        if($chat != null){
          $messages = Message::where('chat_id', $chat->id)->get();
         
        }else{
            $messages = null;
        }

        return view('website.chat', compact('messages') );  
    }
    public function sendMessage(Request $request)
    {
        $chat = is_null(Auth::user()->chat) ?
        Auth::user()->chat()->create(['admin_id' => 6])
        : Auth::user()->chat;

        $validate = Validator::make($request->all(),
        [
            'details'           => 'required',
        ],
        [
            'details.required'  => 'يجب إدخال الرسالة'
        ]);

        if($validate->fails())
        {
            return $this->error("البيانات المدخلة غير صحيحة", $validate->errors(), 422);
        }

        $chat->messages()->create(
        [
            'details'       => $request->details,
            'model'         => 'App\Models\Student',
            'student_view'  => true,
            'sender_id'     => Auth::user()->id
        ]);
        //return $request->details;


        return back()->with(['success','تم الأرسال']);
    }
   
}
