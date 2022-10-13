<?php

namespace App\Http\Controllers\WebController;
use App\Models\Month;
use App\Models\Lesson;
use App\Models\Video;
use App\Models\PdfFile;
use App\Models\Reply;
use App\Models\Question;
use App\Models\Alert;
use App\Models\StudentAnswer;
use App\Models\Comment;
use App\Models\Test;
use App\Models\Answer;
use App\Models\Student;
use App\Models\Group;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Services\TestService;
use App\Http\Requests\Api\V1\TestRequest;
use App\Models\SubscriptionRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Resources\Api\V1\QuestionsResource;



class LessonsController extends Controller
{
    public $data = [
            'view'          => 'lessons',
            'route'         => 'lessons',
            'itemname'      => 'درس',
            'itemsnames'    => 'الدروس',
        ];

        protected $confirmed_answers;
        protected $right_answers = [];
        protected $result;
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $stu_group_id= Auth::user()->group_id;
     
        $first = Month::whereHas('lessons')->findOrFail($id)->lessons->where('group_id',$stu_group_id);
        
        $items =  Lesson::where('month_id', $id)->with('videos')->get();
       
        return view('website.lessons', compact('items'))->with($this->data);
      
    }

    public function show($month_id, $lesson_id, $video_id = null)
    {
        
        $stu_group_id = Auth::user()->group_id;
        $item         = Month::findOrFail($month_id)->lessons()->where('id', $lesson_id)->where('group_id', $stu_group_id)->first();
        $videosPages  = Video::select('id', 'title_vid')->where('lesson_id', $lesson_id)->get();
        if($video_id != null){
            $videos       = Video::findOrFail($video_id);
        }else{
            $videos       = Video::where('lesson_id', $lesson_id)->first();
        }
        
        $comments     = Comment::where('video_id', $video_id)->with('replies')->get();
        $exam_check =  Lesson::findOrFail($lesson_id);
        
        return view('website.lesson_content', compact('item', 'videos', 'videosPages', 'month_id', 'lesson_id', 'comments', 'video_id', 'exam_check'))->with($this->data);
    }

    public function pdf($month_id, $lesson_id)
    {
     
        $stu_group_id= Auth::user()->group_id;
        $item = Month::findOrFail($month_id)->lessons()->where('id', $lesson_id)->where('group_id', $stu_group_id)->first();
        $items = PdfFile::where('lesson_id', $lesson_id)->get();
        $exam_check =  Lesson::findOrFail($lesson_id);
       
        return view('website.lesson_content_pdf', compact('item', 'items', 'exam_check'))->with($this->data);

    }
    public function showPdf($id)
    {

        response()->file($pathToFile);

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
            return 'null';
            return $this->error("الدرس المطلوب غير موجود", [], 404);
        }
        $exam_check =  Lesson::findOrFail($lesson_id);
        return view('website.lesson_quest', compact('questions', 'month_id', 'lesson_id', 'exam_check'))->with($this->data);
      
    }

    public function do_test(Request $request, $month_id, $lesson_id, Lesson $lesson)
    {
    

          foreach($request->questions as $singleQuestion => $val)
        {
       

            $question   = Question::findOrFail($singleQuestion);
            $answer     = $question->answers()->findOrFail($val);
            $answer->right_answer ? $this->right_answers[] = $answer->title : '';
            $this->confirmed_answers[]  = StudentAnswer::create(
            [
                'student_id'    => auth()->user()->id,
                'answer_id'     => $answer->id,
            ])->id;
        }

    
      
        //$result =  $this->result = (count($this->right_answers) / $lesson->questions()->whereHas('answers')->count()) * 100;
        $result =  $this->result = (count($this->right_answers) / $request->number_quest) * 100;

        $test =  Test::create(
        [
            'student_id'            => auth()->user()->id,
            'percentage'            => $this->result,
            'lesson_id'             => $lesson_id
        ]);

        StudentAnswer::whereIn('id', $this->confirmed_answers)->update(['test_id' => $test->id]);

       

        $lesson     = Lesson::findOrFail($lesson_id);
        $percentage =  $result;
        $message = $percentage < 75 ? 'نسبتك أقل من 75%, عاود الإمتحان مرة أخرى' : 'تم إجتياز الإمتحان بنجاح';
        
return back();
        return $this->response(
        [
            'percentage'    => $percentage,
            'pass_avg'      => 75
        ], $message);
    }

    


   
}
