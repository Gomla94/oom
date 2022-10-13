<?php

namespace App\Models;

use App\Models\Student;
use Illuminate\Database\Eloquent\Model;

class Alert extends Model
{
    protected $fillable = 
    [
        'title', 'details', 'view_status'
    ];

    public function students()
    {
        return $this->belongsToMany(Student::class, 'students_alerts');
    }
}
