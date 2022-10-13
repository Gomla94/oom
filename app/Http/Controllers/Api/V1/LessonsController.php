<?php

namespace App\Http\Controllers\Api\V1;
use App\Models\Month;
use App\Models\Lesson;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Student;
use App\Helpers\Services\TestService;
use App\Http\Requests\Api\V1\TestRequest;
use App\Http\Resources\Api\V1\LessonsResource;
use App\Http\Controllers\Api\V1\BaseController;
use App\Http\Resources\Api\V1\QuestionsResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use DB;



class LessonsController extends BaseController
{
    public function get($id)
    {
      $stu_group_id= Auth::user()->group_id;
     
       $month = Month::whereHas('lessons')->findOrFail($id)->lessons->where('group_id',$stu_group_id);
        return $this->response(LessonsResource::collection($month));
    }

    public function show($month_id, $lesson_id)
    {
        $stu_group_id= Auth::user()->group_id;
        $lesson = Month::findOrFail($month_id)->lessons()->where('id', $lesson_id)->where('group_id', $stu_group_id)->first();
        
        if(is_null($lesson))
            return $this->error("الدرس المطلوب غير موجود", [], 404);
            
        return $this->response(new LessonsResource($lesson));
    }

    public function questions($month_id, $lesson_id)
    {
        
       
        $easyno  = Lesson::select('easyno')->where('id',$lesson_id)->get();
        $easyno1 = json_decode($easyno);

        $meduimno= Lesson::select('meduimno')->where('id',$lesson_id)->get();
        $meduimno1 = json_decode($meduimno);

        $hardno=Lesson::select('hardno')->where('id',$lesson_id)->get();
        $hardno1 = json_decode($hardno);

        
        $lesson = Month::findOrFail($month_id)->lessons()->find($lesson_id);
        
        
        $easy = $lesson->questions()->where('difficulty_level',1)->with('answers')->get();
       
        if($easyno1[0]->easyno < $easy->count())
        $easy=$easy->random($easyno1[0]->easyno);

        $meduim = $lesson->questions()->where('difficulty_level',2)->with('answers')->get();
        if($meduimno1[0]->meduimno < $meduim->count())
        $meduim=$meduim->random($meduimno1[0]->meduimno);
       
        $hard = $lesson->questions()->where('difficulty_level',3)->with('answers')->get();
        if($hardno1[0]->hardno < $hard->count())
        $hard=$hard->random($hardno1[0]->hardno);
       
        $questions= $easy->merge($meduim)->merge($hard);
       
        if(is_null($lesson)){
            return $this->error("الدرس المطلوب غير موجود", [], 404);
        } 
       
       
        return $this->response(QuestionsResource::collection($questions));
    }

    public function do_test(TestRequest $request, $month_id, $lesson_id)
    {
        $lesson     = Lesson::findOrFail($lesson_id);
        $percentage = (new TestService)->do_test($request->questions, $lesson)->get_result();
        $message = $percentage < 75 ? 'نسبتك أقل من 75%, عاود الإمتحان مرة أخرى' : 'تم إجتياز الإمتحان بنجاح';
        return $request->questions;

        return $this->response(
        [
            'percentage'    => $percentage,
            'pass_avg'      => 75
        ], $message);
    }
}