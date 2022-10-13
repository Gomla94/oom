<?php

namespace App\Models;

use App\Models\Message;
use App\Models\Student;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $fillable =
    [
        'admin_id', 'student_id'
    ];

    public function messages()
    {
        return $this->hasMany(Message::class, 'chat_id');
    }

    public function student()
    {
        return $this->hasOne(Student::class, 'id', 'student_id');
    }
}
