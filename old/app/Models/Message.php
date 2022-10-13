<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable =
    [
        'chat_id', 'details', 'model', 'sender_id', 'admin_view', 'student_view'
    ];

    protected $appends = ['sender'];

    //protected $hidden = ['model'];

    public function getSenderAttribute()
    {
        return $this->attributes['model']::findOrFail($this->attributes['sender_id'])->name;
    }
}
