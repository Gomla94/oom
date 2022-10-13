<?php

namespace App\Http\Controllers\Admin;

use App\Models\Grade;
use App\Models\Lesson;
use Illuminate\Http\Request;
use App\Helpers\Classes\Helper;
use App\Models\Test as Model;
use App\Events\PushNotifications;
use App\Http\Controllers\Controller;
use App\Models\Student;

class TestsController extends Controller
{

    protected $data =
    [
        'route'     => 'tests',
        'elements'  => 'tests',
        'element'   => 'test',
        'view'      => 'tests',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $items = Model::get();
        $items = Model::with('student')
               ->get();
      
         
        return view('admin.' . $this->data['view'] . '.index', compact('items'))->with($this->data);
    }

    public function show($id)
    {
        $item = Model::find($id);
       
        $item->update(['view_status' => true]);

        return view('admin.' . $this->data['view'] . '.show', compact('item'))->with($this->data);
    }
}
