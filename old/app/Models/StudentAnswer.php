<?php

namespace App\Models;

use App\Models\Test;
use App\Models\Student;
use Illuminate\Database\Eloquent\Model;

class StudentAnswer extends Model
{
    protected $fillable =
    [
        'student_id', 'test_id', 'answer_id'
    ];

    public function student()
    {
        $this->belongsTo(Student::class);
    }

    public function test()
    {
        $this->belongsTo(Test::class);
    }
}
