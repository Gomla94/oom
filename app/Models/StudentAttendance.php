<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class StudentAttendance extends Model
{
    protected $guarded = [];

    protected $casts =
    [
        'checkin_date'    => 'date',
        'checkout_date'      => 'date'
    ];


    public function getCheckInDateAttribute()
    {
        return Carbon::parse($this->attributes['checkin_date'])->format('d-m-Y h:i A'); 
    }

    public function getCheckOutDateAttribute()
    {
        return $this->attributes['checkout_date'] ? 
        Carbon::parse($this->attributes['checkout_date'])->format('d-m-Y h:i A') : null;
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class, 'grade_id', 'id');
    }

    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id', 'id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }
}
