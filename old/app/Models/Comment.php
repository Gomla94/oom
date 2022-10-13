<?php

namespace App\Models;

use App\Models\Reply;
use App\Models\Video;
use App\Models\Lesson;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable =
    [
        'video_id', 'lesson_id', 'comment_id'
    ];

    protected $appends  = ['user'];

    protected $hidden   = ['model'];

    public function getUserAttribute()
    {
        return $this->replies()->first()->user;
    }
    public function userr()
    {
         return $this->hasOne(Student::class, 'id', 'user_id');
    }


    public function lesson()
    {
        return $this->hasOne(Lesson::class, 'id', 'lesson_id');
    }

    public function video()
    {
        return $this->hasOne(Video::class, 'id', 'video_id');
    }

    public function replies()
    {
        return $this->hasMany(Reply::class, 'comment_id', 'id');
    }
}
