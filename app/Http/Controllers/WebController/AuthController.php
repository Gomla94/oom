<?php

namespace App\Http\Controllers\WebController;
use App\Http\Controllers\Controller;
use App\Models\Device;
use App\Models\Grade;
use App\Models\Group;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Api\V1\StudentsResource;
use Illuminate\Support\Facades\Password;
use DB;
use Str;
use Illuminate\Support\Carbon;
use Mail;

class AuthController extends Controller
{

    public function index(Request $request)
    { 
        $grade = Grade::get();
        return view('website/login', compact('grade'));
    }
    public function reg(Request $request)
    { 
        $grade = Grade::get();
        return view('website/register', compact('grade'));
    }

    public function group(Request $request)
    {
        if($request->ajax())            
        {
            $group = Group::where('grade_id', $request->gradid)->get();

            
       
        return response()->json(['statues' => true, 'data' => $group]);
        }
    }

    public function login(Request $request)
    {
    
     
        $validate = Validator::make($request->all(),
        [
            'mac_address'   => 'required',
            //'device_model'  => 'required',
            //'fcm_token'     => 'required',
            'email'         => 'required|email',
            'password'      => 'required|string'
        ]);

        if($validate->fails())
        {
            return back()->withErrors(['error' => 'البيانات المدخلة غير صحيحة']);
        }

        $login = $request->only(['email', 'password']);

       // if( !Auth::attempt($login) || ! Auth::user()->status)
        if( !Auth::attempt($login) )
        {
            return back()->withErrors(['error' => 'بيانات الدخول غير صحيحة']);
        }
        $maco =  md5($_SERVER['HTTP_USER_AGENT'] .  $_SERVER['REMOTE_ADDR']);
        
       // return Auth::user()->devices()->where('mac_address', $request->mac_address)->first();

        $device     = Auth::user()->devices()->where('mac_address', $request->mac_address)->first();

        if(is_null($device))
        {
            Auth::user()->devices()->create(
            [
                'model'         => 'Web',
                'mac_address'   => $request->mac_address
            ]);

            Auth::logout();
            return back()->withErrors(['error' => 'هذا الجهاز غير مسجل لدينا , برجاء الرجوع للإدراة لتفعيل الجهاز']);
          
        } 

        if(! $device->status)
        {
            Auth::logout();
            return back()->withErrors(['error' => 'هذا الجهاز غير مسجل لدينا , برجاء الرجوع للإدراة لتفعيل الجهاز']);
        }
 
 //       Auth::user()->FCM_tokens()->delete();

       /*  Auth::user()->FCM_tokens()->create(
        [
            'token'     => $request->fcm_token
        ]); */
    

        $access_token = Auth::user()->createToken('api_token')->accessToken;

        return redirect('/')->with('success', 'Good Job You Are Inserted a New Page');

        //return $this->response(['student' => new StudentsResource(Auth::user()), 'access_token' => $access_token], "تم تسجيل الدخول");
    }

    public function register(Request $request)
    {
        $data = $request->validate(
        [
            'name'          => 'required|min:3|max:191',
            'email'         => 'required|email|unique:students,email',
            'password'      => 'required|confirmed|min:6|max:191',
            'phone'         => 'required|unique:students,phone',
            'address'       => 'required|min:3|max:191',
            'group_id'      => 'required|exists:groups,id',
           // 'fcm_token'     => 'required',
            'mac_address'   => 'required',
           // 'device_model'  => 'required|string',
        ], [ 'name.required' => 'please Fill Your Name'
            ]);


        $data['password']   = bcrypt($request->password);
        $student            = Student::create($data);
        $maco =  md5($_SERVER['HTTP_USER_AGENT'] .  $_SERVER['REMOTE_ADDR']);

       

        $student->devices()->create(
        [
            'mac_address'           => $request->mac_address,
            'model'                 => 'Wep',
            //'status'                => true
        ]);

        Auth::login($student);

     //   $access_token = Auth::user()->createToken('api_token')->accessToken;
     return redirect('/')->with('success', 'تم تسجيل الدخول');
    }
    
       public function showResetPasswordForm($token)
            {
                  return view('auth.forgetPasswordLink', ['token' => $token]);
            }
    
        public function forgot_password(Request $request)
            {
                  $rules = array(
                    'email' => "required|email",
                );
                //You can add validation login here
                    $user = DB::table('students')->where('email', $request->email)
                        ->first();
              
               // $students = Validator::where('email', $input)->first();
               
                //$validator = Validator::make($input, $rules);
                if ($user == null) { 
                    $arr = array("status" => 400, "message" => 'هذا البريد غير مسجل من قبل ');
                   //  return $this->response(new GroupsResource($grade->first()->groups()->get()));
                } else {
                    
                     $token = Str::random(64);
  
                      DB::table('password_resets')->insert([
                          'email' => $request->email, 
                          'token' => $token, 
                          'created_at' => Carbon::now()
                        ]);
              
                      Mail::send('email.forgetPassword', ['token' => $token], function($message) use($request){
                          $message->to($request->email);
                          $message->subject('Reset Password');
                      });
              
                 $arr = array("status" => 200, "message" => 'تم إرسال رابط أسترجاع كلمة السر ');
                }
                return \Response::json($arr);
            }
            
            public function submitResetPasswordForm(Request $request)
      {
              
          $request->validate([
              'email' => 'required|email|exists:students',
              'password' => 'required|string|min:6|confirmed',
              'password_confirmation' => 'required'
          ]);
        
  
       
          $updatePassword = DB::table('password_resets')
                              ->where([
                                'email' => $request->email, 
                                'token' => $request->token
                              ])
                              ->first();
  
          if(!$updatePassword){
              return back()->withInput()->with('error', 'Invalid token!');
          }
         
          $user = Student::where('email', $request->email)
                      ->update(['password' => Hash::make($request->password)]);
 
         DB::table('password_resets')->where(['email'=> $request->email])->delete();
       
  
         return redirect('/')->withSuccess('تم التعديل');
      }
            
      
         
}
