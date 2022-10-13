<?php

namespace App\Helpers\Services;

use App\Models\Lesson;
use App\Models\Question;
use App\Models\StudentAnswer;

class TestService
{
    protected $confirmed_answers;
    protected $right_answers = [];
    protected $result;

    public function do_test(Array $questions, Lesson $lesson) : TestService
    {
        foreach($questions as $singleQuestion)
        {
            $question   = Question::findOrFail($singleQuestion['id']);
            $answer     = $question->answers()->findOrFail($singleQuestion['answer_id']);
            $answer->right_answer ? $this->right_answers[] = $answer->title : '';
            $this->confirmed_answers[]  = StudentAnswer::create(
            [
                'student_id'    => auth()->user()->id,
                'answer_id'     => $answer->id,
            ])->id;
        }

        $this->result = (count($this->right_answers) / $lesson->questions()->whereHas('answers')->count()) * 100;

        $test = $lesson->tests()->create(
        [
            'student_id'            => auth()->user()->id,
            'percentage'            => $this->result
        ]);

        StudentAnswer::whereIn('id', $this->confirmed_answers)->update(['test_id' => $test->id]);

        return $this;
    }

    public function get_result() : int
    {
        return $this->result;
    }
}
