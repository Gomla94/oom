<?php

namespace App\Models;

use App\Models\Group;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $fillable = 
    [
        'title'
    ];

    public function groups()
    {
        return $this->hasMany(Group::class);
    }
}
