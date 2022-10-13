<?php

namespace App\Models;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{

    protected $fillable =
    [
        'text', 'model', 'comment_id', 'user_id'
    ];

    protected $hidden = ['model'];

    public function getUserAttribute()
    {
        return $this->attributes['model']::findOrFail($this->attributes['user_id'])->name;
    } 
    
    public function comment()
    {
        return $this->hasOne(Comment::class, 'id', 'comment_id');
    }
}
