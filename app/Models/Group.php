<?php

namespace App\Models;

use App\Models\Student;
use App\Models\Lesson;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = 
    [
        'title', 'grade_id'
    ];

    public function students()
    {
        return $this->hasMany(Student::class, 'group_id', 'id');
    }

    public function grade()
    {
        return $this->hasOne(Grade::class, 'id', 'grade_id');
    }

    public function getTitleAndGradeAttribute()
    {
        return  $this->grade->title . ' | ' . $this->attributes['title'];
    }

    public function lesson()
    {
        return $this->belongsToMany(Lesson::class ,'group_lesson');
    }

    public function attendances()
    {
        return $this->hasMany(StudentAttendance::class, 'group_id', 'id');
    }
}
