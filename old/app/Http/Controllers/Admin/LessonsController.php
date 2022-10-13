<?php

namespace App\Http\Controllers\Admin;

use App\Models\Grade;
use App\Models\Group;
use App\Models\Month;
use App\Models\Video;
use App\Models\PdfFile;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Helpers\Classes\Helper;
use App\Models\Lesson as Model;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use DB;

class LessonsController extends Controller
{

    protected $data =
    [
        'route'     => 'lessons',
        'elements'  => 'lessons',
        'element'   => 'lesson',
        'view'      => 'lessons',
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
        $grades     = Grade::get()->pluck('title', 'id')->prepend(Helper::admin_trans('choose'), 0);
        $months     = Month::get()->pluck('title', 'id')->prepend(Helper::admin_trans('choose'), 0);
        return view('admin.' . $this->data['view'] . '.create', compact('grades', 'months'))->with($this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        // return $request->pdf_files;

        $request->validate(
        [
              'title'                     => 'required|max:191',
              'exam_link'                 => 'nullable',
              'group_id'                  => 'required',
              'month_id'                  => 'required|exists:months,id',
              'questions.*.*'             => 'required|exists:questions,id',
              'videos.files.*'            => 'required|mimes:mp4,mov,movi,ogg,qt,wmv',
              'additional_questions.*'    => 'nullable|exists:questions,id',
              'image_file'                => 'required|image',
              'pdf_files'                 => 'nullable',
              'pdf_files.*.title'         => 'string|max:191',
              'pdf_files.*.file'          => 'pdf_or_link',
              'easyno'                    => 'required',
              'meduimno'                  => 'required',
              'hardno'                    => 'required'

        ]);
          
        $all_groups = Group::where('grade_id', $request->grade_id)->pluck('id');
        
         if($request->group_id == 'all'){
             
            for($group_id=0; $group_id<count($all_groups); $group_id++){
               
                $request['image']               = $request->file('image_file')->store('lessons_covers');
                $request['group_id']            = $all_groups[$group_id];
                $item = Model::create($request->all());
                $item->questions()->sync($request->questions);
        
                if ($request->hasFile('videos.files'))
                {
                    foreach($request->file('videos.files') as $key => $video)
                    {
                        $item->videos()->create(
                        [
                            'provider'      => 'local',
                            'title_vid'     => $request->computer['title'][$key],
                            'link'     => $video->store('lessons_videos')
                        ]);
                    }
                }
        
                if ($request->has('videos.links'))
                {
                    foreach($request->input('videos.links') as $key => $link)
                    {
                        $item->videos()->create(
                        [
                            'provider' => 'youtube',
                            'title_vid'     => $request->youtube['title'][$key],
                            'link'     => $link
                        ]);
                    }
                }
                if ($request->has('videos.stream'))
                {
                    foreach($request->input('videos.stream') as $key => $link)
                    {
                        $item->videos()->create(
                        [
                            'provider' => 'stream',
                            'title_vid'     => $request->stream['title'][$key],
                            'link'     => $link
                        ]);
                    }
                }
                if ($request->has('videos.vimeo'))
                {
                    foreach($request->input('videos.vimeo') as $key => $link)
                    {
                        $item->videos()->create(
                        [
                            'provider' => 'vimeo',
                            'title_vid'     => $request->vimeo['title'][$key],
                            'link'     => $link
                        ]);
                    }
                }
        
                if ($request->has('pdf_files'))
                {
                    foreach($request->pdf_files as $file)
                    {
                        $item->files()->create(
                        [
                            'title'         => $file['title'],
                            'file_src'      => is_file($file['file'] ?? '') ? $file['file']->store('lessons_files') : $file['url']
                        ]);
                    }
                }
        
                if($request->has('additional_questions'))
                {
                    foreach($request->additional_questions as $question)
                    {
                        Question::find($question)->update(['lesson_id' => $item->id]);
                    }
                }
            }
         }

         else{
           
         
        $request['image']    = $request->file('image_file')->store('lessons_covers');

        $item = Model::create($request->all());
        $item->questions()->sync($request->questions);

        if ($request->hasFile('videos.files'))
        {
            foreach($request->file('videos.files') as $key => $video)
            {
                $item->videos()->create(
                [
                    'provider'      => 'local',
                    'title_vid'     => $request->computer['title'][$key],
                    'link'     => $video->store('lessons_videos')
                ]);
            }
        }

        if ($request->has('videos.links'))
        {
            foreach($request->input('videos.links') as $key => $link)
            {
                $item->videos()->create(
                [
                    'provider'  => 'youtube',
                    'title_vid'     => $request->youtube['title'][$key],
                    'link'     => $link
                ]);
            }
        }
        if ($request->has('videos.stream'))
                {
                    foreach($request->input('videos.stream') as $key => $link)
                    {
                        $item->videos()->create(
                        [
                            'provider' => 'stream',
                            'title_vid'     => $request->stream['title'][$key],
                            'link'     => $link
                        ]);
                    }
                }
         if ($request->has('videos.vimeo'))
        {
            foreach($request->input('videos.vimeo') as $key => $link)
            {
                $item->videos()->create(
                [
                    'provider'  => 'vimeo',
                    'title_vid'     => $request->vimeo['title'][$key],
                    'link'     => $link
                ]);
            }
        }

        if ($request->has('pdf_files'))
        {
            foreach($request->pdf_files as $file)
            {
                $item->files()->create(
                [
                    'title'         => $file['title'],
                    'file_src'      => is_file($file['file'] ?? '') ? $file['file']->store('lessons_files') : $file['url']
                ]);
            }
        }

        if($request->has('additional_questions'))
        {
            foreach($request->additional_questions as $question)
            {
                Question::find($question)->update(['lesson_id' => $item->id]);
            }
        }
    }
        return Helper::redirect($request->new, $this->data['route']);
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
        $grades     = Grade::get()->pluck('title', 'id')->prepend(Helper::admin_trans('choose'), 0);
        $months     = Month::get()->pluck('title', 'id')->prepend(Helper::admin_trans('choose'), 0);
        $questions  = Question::get()->pluck('title', 'id');
        return view('admin.' . $this->data['view'] . '.edit', compact('item', 'grades', 'months', 'questions'))->with($this->data);
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
            'title'                     => 'required|max:250',
            'exam_link'                 => 'nullable',
            'group_id'                  => 'required|exists:groups,id',
            'month_id'                  => 'required|exists:months,id',
            'questions.*.*'             => 'required|exists:questions,id',
            'videos.files.*'            => 'nullable|mimes:mp4,mov,movi,ogg,qt,wmv',
            'additional_questions.*'    => 'nullable|exists:questions,id',
            'image_file'                => 'nullable|image',
            'pdf_files'                 => 'nullable',
            'pdf_files.*.title'         => 'nullable|string|max:250',
            'pdf_files.*.file'          => 'pdf_or_link',
        ]);

        if ($request->hasFile('image_file'))
        {
            Storage::delete($item->image);
            $request['image']               = $request->file('image_file')->store('lessons_covers');
        }

        $item->update($request->all());
        

      //  $item->questions()->sync($request->questions);

        if ($request->hasFile('videos.files'))
        {
            
            foreach($request->file('videos.files') as $key => $video)
            {
                $item->videos()->create(
                [
                    'provider'      => 'local',
                     'title_vid'     => $request->computer['title'][$key],
                    'link'          => $video->store('lessons_videos')
                ]);
            }
        }

        if ($request->has('videos.links'))
        {
            foreach($request->input('videos.links') as $key => $link)
            {
                $item->videos()->create(
                [
                    'provider'  => 'youtube',
                     'title_vid'     => $request->youtube['title'][$key],
                    'link'     => $link
                ]);
            }
        }
      
         if ($request->has('videos.vimeo'))
        {
           
            foreach($request->input('videos.vimeo') as $key => $link)
            {
                /*dd($request->vimeo['title'][0]);*/
                $item->videos()->create(
                [
                    'provider'      => 'vimeo',
                    'title_vid'     => $request->vimeo['title'][$key],
                    'link'          => $link
                ]);
            }
        }
        
        if ($request->has('videos.stream'))
                {
                    foreach($request->input('videos.stream') as $key => $link)
                    {
                        $item->videos()->create(
                        [
                            'provider'       => 'stream',
                            'title_vid'      => $request->stream['title'][$key],
                            'link'           => $link
                        ]);
                    }
                }

        if ($request->has('pdf_files'))
        {
            foreach($request->pdf_files as $file)
            {
                $item->files()->create(
                [
                    'title'         => $file['title'],
                    'file_src'      => is_file($file['file'] ?? '') ? $file['file']->store('lessons_files') : $file['url']
                ]);
            }
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
        $item->questions()->delete();
        $deleted_items = [$item->image];
        foreach ($item->videos as $video)
            $deleted_items[] = $video->video_src;

        foreach ($item->files as $file)
            $deleted_items[] = $file->file_src;
        Storage::delete($deleted_items);
        $item->delete();
        return Helper::redirect($request->new, $this->data['route']);
    }

    public function delete_video(Request $request)
    {
        $video = Video::findOrFail($request->id);
        $video->video_src ? Storage::delete($video->video_src) : '';
        $video->delete();
        return response()->json(['message' => 'تم حذف الفيديو بنجاح']);
    }

    public function delete_file(Request $request)
    {
        $file = PdfFile::findOrFail($request->id);
        $file->file_src ? Storage::delete($file->file_src) : '';
        $file->delete();
        return response()->json(['message' => 'تم حذف الملف بنجاح']);
    }

    public function get_groups(Request $request)
    {
        return response()->json(Group::where('grade_id', $request->grade_id)->get());
    }

    public function get_months(Request $request)
    {
        return response()->json(Month::where('grade_id', $request->grade_id)->get());
    }
}
