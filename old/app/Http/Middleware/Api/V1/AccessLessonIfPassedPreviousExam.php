<?php

namespace App\Http\Middleware\Api\V1;

use App\Helpers\Classes\Helper;
use Closure;
use App\Models\Test;
use App\Models\Lesson;
use Illuminate\Support\Facades\Auth;

class AccessLessonIfPassedPreviousExam
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $previous_lesson = Lesson::where('id', '<', $request->route('lesson_id'))->where('month_id', $request->route('month_id'))->orderBy('id')->first();

        /*if(! is_null($previous_lesson))
        {
            $test = Test::where('student_id', Auth::user()->id)->where('lesson_id', $previous_lesson->id);
            if(! $test->exists() || $test->first()->percentage < 75)
                return Helper::error("يجب إجتياز 75% على الأقل من إمتحان الدرس السابق لتتمكن من الدخول للدرس الجديد");
        }*/

        return $next($request);
    }
}
