<?php

namespace App\Helpers\Classes;
use App\Models\Alert;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Traits\Admin;
use App\Helpers\Traits\Media;
use App\Helpers\Traits\Getters;
use App\Helpers\Traits\Language;
use App\Helpers\Traits\Notifications;
use App\Helpers\Traits\Response;

class Helper
{
    use Admin, Language, Media, Notifications, Getters, Response;

    public static function app_name()
    {
        return json_decode(env('APP_NAME'), true)[app()->getLocale()];
    }

    public static function redirect($new, $route, $page = 'index')
    {
        $redirect = $new ? back() : redirect()->route('admin.' . $route . '.' . $page);

        $redirect = $redirect->withSuccess(Helper::admin_trans('success'));

        return $redirect;
    }

    public static function notifications()
    {
        $alert = Alert::whereHas('students', function ( $query) {

            $query->where('student_id', Auth::user()->id);})->orderBy('created_at', 'DESC')->get();

           return $alert;
    }

    public static function count_note()
    {
        $notification  = Auth::user()->alerts()->where('students_alerts.view_status', '0')->count();
        /*         $notification  = Auth::user()->alerts()->where('alerts.view_status', '0')->count();
        */        
        return $notification;
    }

    public static function messages(){

        $chat = Auth::user()->chat()->first();
        if($chat != null){
          $messages = Message::where('chat_id', $chat->id)->get();
         
        }else{
            $messages = null;
        }
       return $messages;
    }

    public static function count_msg(){
        $message       = Auth::user()->chat()->select('id')->first();
        if($message == null)
        {
          $count_message = 0;
        }
        else{
            $count_message = Message::where('chat_id', $message->id)->where('student_view', '0')->count();
        }

        return $count_message;
      
    }
}
