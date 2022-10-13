<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Chat;
use App\Models\Test;
use App\Models\Alert;
use App\Models\Group;
use App\Models\Grade;
use App\Models\Month;
use App\Models\Device;
use App\Models\FcmToken;
use Laravel\Passport\HasApiTokens;
use App\Models\SubscriptionRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $fillable =
    [
        'name', 'email', 'password', 'phone', 'address', 'notes', 'class_id', 'group_id', 'status', 'parent_phone_number'
    ];
    
    public function grade()
    {
         $group_id =  Auth::user()->group_id;
        $group = Group::select('grade_id')->findOrFail($group_id);
       return $gradeee = Grade::findOrFail($group);
    }

    protected $hidden = ['password'];

    public function group()
    {
        return $this->hasOne(Group::class, 'id', 'group_id');
    } 
    public function groups()
    {
        return $this->hasOne(Group::class, 'id', 'group_id')->select('grade_id');
    }

    public function months()
    {
        return $this->belongsToMany(Month::class, 'months_students');
    }

    public function subscriptions()
    {
        return $this->hasMany(SubscriptionRequest::class)->where('payment_status', 1);
    }

    public function student_attendances()
    {
        return $this->hasMany(StudentAttendance::class, 'student_id', 'id');
    }

    public function alerts()
    {
        return $this->belongsToMany(Alert::class, 'students_alerts')->withPivot('view_status');
    }


    public function chat()
    {
        return $this->hasOne(Chat::class, 'student_id', 'id');
    } 
  
   
    
    public function grade_1()
    {
        return $this->grade()->where('id', $this->groups());
    }


    public function devices()
    {
        return $this->hasMany(Device::class, 'student_id', 'id');
    }

    public function FCM_tokens()
    {
        return $this->hasMany(FcmToken::class, 'student_id', 'id');
    }

    public function tests()
    {
        return $this->hasMany(Test::class);
    }

    public function getMessagesAttribute()
    {
        return ! is_null($this->chat) ? $this->chat->messages : null;
    }

    public function getMonthAttribute()
    {
        if(optional($this->subscriptions()->first())->payment_status && Carbon::now() < Carbon::parse(optional($this->months()->orderBy('id', 'DESC')->first())->end_date))
        {
            return $this->months()->orderBy('id', 'DESC')->first();
        }
        return 'غير مشترك';
    }

    public function routeNotificationForFcm($notification)
    {
        return $this->device_token;
    }
}
