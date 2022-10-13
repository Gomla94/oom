<?php

namespace App\Models;

use App\Models\Answer;
use App\Helpers\Classes\Helper;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable =
    [
        'title', 'description', 'image', 'difficulty_level', 'type', 'lesson_id', 'true_false'
    ];

    public function answers()
    {
        return $this->hasMany(Answer::class, 'question_id', 'id');
    }

    public function getRightAnswerAttribute()
    {
        if($this->attributes['type'] == 1)
            return $this->attributes['true_false'] == 1 ? ["title" => "صح"] : ["title" => "خطأ"];
        return $this->answers()->where('right_answer', true)->first();
    }

    public function getDifficultyAttribute()
    {
        /**
         * [
         *      1 => 'easy',
         *      2 => 'medium',
         *      3 => 'hard',
         * ]
         */

        switch ($this->attributes['difficulty_level'])
        {
            case $easy = 1:
                return Helper::admin_trans('easy');
                break;
            case $medium = 2:
                return Helper::admin_trans('medium');
                break;
            case $hard = 3:
                return Helper::admin_trans('hard');
                break;

            default: // Easy
                return Helper::admin_trans('easy');
                break;
        }
    }

      public function lessons()
    {
        return $this->belongsToMany(Lesson::class, 'lessons_questions');
    } 

    public function setImageAttribute($image)
    {
        $this->attributes['image'] = $image->store('questions');
    }
}
