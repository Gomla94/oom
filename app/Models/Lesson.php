<?php

namespace App\Models;

use App\Models\Test;
use App\Models\Group;
use App\Models\Month;
use App\Models\Video;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable =
    [
        'title', 'group_id', 'month_id', 'image','easyno','meduimno','hardno', 'exam_link'
    ];

    public function questions()
    {
        return $this->belongsToMany(Question::class, 'lessons_questions');
        //return $this->belongsTo(Question::class, 'lesson_id', 'id');
    }

    public function videos()
    {
        return $this->hasMany(Video::class);
    }

    public function files()
    {
        return $this->hasMany(PdfFile::class, 'lesson_id', 'id');
    }

    public function month()
    {
        return $this->hasOne(Month::class, 'id', 'month_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'lesson_id', 'id');
    }

    public function tests()
    {
        return $this->hasMany(Test::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function groups()
    {
        return $this->belongsToMany(Group::class, 'group_lesson');
    }
}
