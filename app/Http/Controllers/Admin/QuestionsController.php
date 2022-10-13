<?php

namespace App\Http\Controllers\Admin;

use App\Models\Grade;
use App\Models\Month;
use App\Models\Student;
use App\Models\Lesson;
use Illuminate\Http\Request;
use App\Helpers\Classes\Helper;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\Question as Model;

class QuestionsController extends Controller
{

    protected $data =
    [
        'route'     => 'questions',
        'elements'  => 'questions',
        'element'   => 'question',
        'view'      => 'questions'
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
       
        $items = Model::get();
        return view('admin.' . $this->data['view'] . '.index', compact('items'))->with($this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          $lessons = Lesson::pluck('title','id')->all();
 
      //  $lessons = Lesson::select(['title', 'id', 'group_id'])->get();
        /*$lessons = Lesson::pluck('title', 'id')->all();*/
      /*  $group = lesson::select('group_id')->get();*/
      
          return view('admin.' . $this->data['view'] . '.create', compact('lessons'))->with($this->data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
        [
            'title'             => 'required|max:250',
            'description'       => 'required|min:10',
            'image'             => 'required',
            'image.*'           => 'image',
            'difficulty_level'  => 'required|in:1,2,3',
            'type'              => 'required|in:1,2',
            'answers.*'         => 'required',
            'answers.*.title'   => 'required|max:250',
            'true_false'        => 'nullable|in:0,1',
            'lesson_id'         => 'required'

        ]);

        $request['true_false'] = $request->type == 1 ? (boolean) $request->true_false : null;

        $item = Model::create($request->all());
        $item->lessons()->sync($request->lesson_id);
        
// if($request['true_false'] == 0){ $theright = 'false';} else { $theright= 'true';}
 
        if($request->type == 2)
        {
            foreach ($request->answers as $answer)
            {
                $item->answers()->create(
                [
                    'title'         => $answer['title'],
                    'right_answer'  => isset($answer['right'])
                ]);
            }
        }else{
          //  for ($x = 0; $x <= 1; $x++) {
 if($request['true_false'] == 0){ 

             $item->answers()->create(
                [
                    'title'         => 'true',
                    'right_answer'  => 0
                ]);
                  $item->answers()->create(
                [
                    'title'         => 'false',
                    'right_answer'  => 1
                ]);
         }else{
               $item->answers()->create(
                [
                    'title'         => 'false',
                    'right_answer'  => 0
                ]);
      $item->answers()->create(
                [
                    'title'         => 'true',
                    'right_answer'  => 1
                ]);
        }
        //    }
        }

        return $request->ajax() ? response()->json(['data' => $item, 'message' => 'تم إضافة سؤال جديد'], 200) : Helper::redirect($request->new, $this->data['route']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
           $item       = Model::findOrFail($id);
        $lessons = Lesson::pluck('title','id')->all();

        // $lessons = Lesson::select(['title', 'id', 'group_id'])->get();
     //   $lessons = Lesson::pluck('title','id')->all();
        return view('admin.' . $this->data['view'] . '.edit', compact('item','lessons'))->with($this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = Model::findOrFail($id);

        $request->validate(
        [
            'title'             => 'required|max:250',
            'description'       => 'required|min:10',
            'image'             => 'nullable',
            'image.*'           => 'image',
            'difficulty_level'  => 'required|in:1,2,3',
            'type'              => 'required|in:1,2',
            'answers.*'         => 'required',
            'answers.*.title'   => 'required|max:250',
            'true_false'        => 'nullable|in:0,1',
            'lesson_id'         => 'required'

        ]);


        $request['true_false'] = $request->type == 1 ? (boolean) $request->true_false : null;

        $item->update($request->all());
        $item->lessons()->sync($request->lesson_id);

        $item->answers()->delete();

        if($request->type == 2)
        {
            foreach ($request->answers as $answer)
            {
                $item->answers()->create(
                [
                    'title'         => $answer['title'],
                    'right_answer'  => isset($answer['right'])
                ]);
            }
        }else{
          //  for ($x = 0; $x <= 1; $x++) {
 if($request['true_false'] == 0){ 

             $item->answers()->create(
                [
                    'title'         => 'true',
                    'right_answer'  => 0
                ]);
                  $item->answers()->create(
                [
                    'title'         => 'false',
                    'right_answer'  => 1
                ]);
         }else{
               $item->answers()->create(
                [
                    'title'         => 'false',
                    'right_answer'  => 0
                ]);
      $item->answers()->create(
                [
                    'title'         => 'true',
                    'right_answer'  => 1
                ]);
        }
        //    }
        }

        return Helper::redirect($request->new, $this->data['route']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Request $request, $id)
    {
        $item = Model::findOrFail($id);
        $item->answers()->delete();
        $item->delete();
        return Helper::redirect($request->new, $this->data['route']);
    }
}
