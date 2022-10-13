<?php

namespace App\Models;

use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Month extends Model
{
    protected $fillable =
    [
        'title', 'price', 'grade_id', 'start_date', 'end_date', 'image'
    ];

    protected $casts =
    [
        'start_date'    => 'date',
        'end_date'      => 'date'
    ];

    // Relations

    public function grade()
    {
        return $this->hasOne(Grade::class, 'id', 'grade_id');
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'months_students');
    }
    
    public function subscribe()
    {
          return $this->hasOne(SubscriptionRequest::class, 'month_id', 'id');
    }

    public function subscriptions()
    {
        return $this->hasMany(SubscriptionRequest::class, 'month_id', 'id');
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class, 'month_id', 'id');
    }

    // Mutators

    public function setImageAttribute($image)
    {
        Storage::delete($this->image);
        $this->attributes['image'] = $image->store('months');
    }
}
