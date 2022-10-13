<?php

namespace App\Models;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable =
    [
        'title_vid', 'link', 'lesson_id', 'provider'
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class, 'video_id', 'id');
    }

}
