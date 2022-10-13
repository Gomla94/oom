<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $fillable =
    [
        'student_id', 'model', 'mac_address', 'status'
    ];
}
