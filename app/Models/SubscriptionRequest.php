<?php

namespace App\Models;

use App\Models\Month;
use App\Models\Student;
use Illuminate\Database\Eloquent\Model;

class SubscriptionRequest extends Model
{
    protected $fillable =
    [
        'student_id', 'month_id', 'payment_status', 'viewed_status', 'payment_method', 'attachement'
    ];

    public function student()
    {
        return $this->hasOne(Student::class, 'id', 'student_id');
    }

    public function month()
    {
        return $this->hasOne(Month::class, 'id', 'month_id');
    }
}
