<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Student;
use App\Models\Alert;
use App\Models\Message;
use App\Models\Grade;
use App\Models\Chat;
use App\Models\Group;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Api\V1\BaseController;
use App\Http\Resources\Api\V1\StudentsResource;
use Illuminate\Support\Facades\Hash;

class StudentsController extends BaseController
{
    public function information()
    {
      /*  $group_id =  Auth::user()->group_id;
        $group = Group::select('grade_id')->findOrFail($group_id);
        $gradeee = Grade::findOrFail($group);*/
        $aut = Auth::user();
       
        return $this->response( new StudentsResource($aut), 'success');
    }

    public function update(Request $request)
    {
        $validate = Validator::make($request->all(),
        [
            'name'          => 'required|min:3|max:191',
            'email'         => 'required|email|unique:students,email,' . Auth::user()->id,
            'phone'         => 'required|unique:students,phone,' . Auth::user()->id,
            'address'       => 'required|min:3|max:191'
        ]);

        if($validate->fails())
            return $this->error("البيانات المدخلة غير صحيحة", $validate->errors(), 422);

        Auth::user()->update($request->all());

        return $this->response([], 'تم تعديل الملف الشخصي');
    }
    
    public function password_update(Request $request)
    {
      
        if($request->password != null){

            $current_password       = auth()->user()->password;
            $old_password           = $request->old_password;
            $password               = bcrypt($request->password);
            
            $data = $this->validate($request,[
                'password'      => 'min:6|confirmed',
            ]);

            if(Hash::check($old_password, $current_password))
                {
                   
                 Auth::user()::where('id', auth()->user()->id)->update(['password'=>$password]);
                 return $this->response([], 'تم تعديل كلمة السر بنجاح ');

                }
            else{
               
                 return $this->error("كلمة المرور الحالية خطأ");
                }

        }
        
    }
    
    

     public function notifications()
    {
        return $this->response(['alerts' => auth()->user()->alerts]);

    }

    public function notifications_update_status($notification_id)
    {
        $notification = auth()->user()->alerts;
        
        foreach($notification as $notification){
             auth()->user()->alerts()->updateExistingPivot($notification->id, ['view_status' => true]);
        }
           $alert = Alert::findOrFail($notification_id)->update(['view_status' => '1']);

        return $this->response([], 'donee !');
    }
    
    public function allNotifications_update_status(Request $request)
    {
   
        $notifications = auth()->user()->alerts()->where('students_alerts.view_status', '0')->get();
  
        foreach($notifications as $notification){
           
            auth()->user()->alerts()->updateExistingPivot($notification , ['view_status' => 1]);
          //  auth()->user()->alerts()->where('students_alerts.view_status', '0');
        }

       // Alert::whereIn('id', $request->id)->update(['view_status' => '1']);
        return $this->response([], 'done !');
    }
    
    public function count_message_notifications()
    {
   
         $notification  = auth()->user()->alerts()->where('students_alerts.view_status', '0')->count();
/*         $notification  = auth()->user()->alerts()->where('alerts.view_status', '0')->count();
*/        
         $message       = auth()->user()->chat()->select('id')->first();
         if($message == null)
         {
           $count_message = 0;
         }
         else{
             $count_message = Message::where('chat_id', $message->id)->where('student_view', '0')->count();
         }
       
         
       
         
     
       return $this->response(["message_not_viewed" => $count_message, "notifications_not_viewed" => $notification], 'donee !');
    }
    
    
    
    
    
}
