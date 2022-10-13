<?php

namespace App\Http\View\Composer;

use App\Models\Question;
use Illuminate\View\View;

class LessonsComposer
{
    public function compose(View $view)
    {
        $view->with('easy', Question::where('difficulty_level', 1)->get()->pluck('title', 'id'))
             ->with('medium', Question::where('difficulty_level', 2)->get()->pluck('title', 'id'))
             ->with('hard', Question::where('difficulty_level', 3)->get()->pluck('title', 'id'));
    }
}
