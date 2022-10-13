<?php

namespace App\Models;

use App\Models\Lesson;
use App\Models\Student;
use App\Models\StudentAnswer;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $fillable =
    [
        'student_id', 'lesson_id', 'percentage', 'view_status'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    public function student_answers()
    {
        return $this->hasMany(StudentAnswer::class);
    }
}
