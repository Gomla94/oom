<?php

namespace App\Http\Controllers\Admin\Users;

use App\Helpers\Classes\Helper;
use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\StudentAttendance as Model;


class StudentsAttendanceController extends Controller
{

    public function __construct()
    {
        $this->today = date('Y-m-d', strtotime('today'));
        $this->tomorrow = date('Y-m-d', strtotime('tomorrow'));
    }
    
    protected $data =
    [
        'route'     => 'users.students_attendances',
        'elements'  => 'student_attendances_create',
        'checkout_elements'  => 'student_attendances_create_checkout',
        'element'   => 'student',
        'view'      => 'users.students.students_attendances',
    ];

    public function index()
    {
        $items = Model::with('student')->orderBy('id', 'DESC')->get();
        // dd($items);
        return view('admin.' . $this->data['view'] . '.index', compact('items'))->with($this->data);
    }

    public function create()
    {
        return view('admin.' . $this->data['view'] . '.create')->with($this->data);
    }

    public function store(Request $request)
    {

        try {
            $student = Student::find($request->student_id);
            if(!$student) {
                return response()->json(['error' => Helper::admin_trans('student_not_found')]);
            }

            if(!$this->checkIfThereAttendanceForToday($student, 'checkin_date', [$this->today, $this->tomorrow])){
                $student->student_attendances()->create([
                    'checkin_date' => now(),
                    'group_id' => $student->group_id,
                    'grade_id' => $student->group->grade_id
                ]);
                return response()->json(['message' => Helper::admin_trans('student_checkin_created')]);
            }

            return response()->json(['error' => Helper::admin_trans('student_checkin_exists')]);
        } catch (\Throwable $th) {
            return response()->json(['error' => Helper::admin_trans('something_went_wrong')]);
        }
        
    }

    public function create_checkout()
    {
        return view('admin.' . $this->data['view'] . '.create_checkout')->with($this->data);
    }

    public function store_checkout(Request $request)
    {

        try {
            $student = Student::find($request->student_id);
            if(!$student) {
                return response()->json(['error' => Helper::admin_trans('student_not_found')]);
            }

            $today_checkout = $this->checkIfThereAttendanceForToday($student, 'checkout_date', [$this->today, $this->tomorrow]);
            if($today_checkout) {
                return response()->json(['error' => Helper::admin_trans('student_checkout_exists')]);
            }


            $today_attendance = $this->checkIfThereAttendanceForToday($student, 'checkin_date', [$this->today, $this->tomorrow]);
            if($today_attendance) {
                $today_attendance->update([
                    'checkout_date' => date('Y-m-d H:i:s')
                ]);
                return response()->json(['message' => Helper::admin_trans('student_checkout_created')]);
            }

            return response()->json(['error' => Helper::admin_trans('no_student_checkin_created')]);
        } catch (\Throwable $th) {
            return response()->json(['error' => Helper::admin_trans('something_went_wrong')]);
        }
        
    }

    protected function checkIfThereAttendanceForToday($student, $checkType = null, $dates = [])
    {
        
        $today_attendance = $student->student_attendances()->where($checkType, '>=', $dates[0])
        ->where($checkType,  '<', $dates[1])->first();

        if(!$today_attendance) {
            return false;
        }

        return $today_attendance;

    }

    public function weekly_report($student_id)
    {

        $student = Student::findOrFail($student_id);
        $lastSaturday = date('Y-m-d', strtotime('last saturday'));
        $nextSaturday = date('Y-m-d', strtotime('next saturday'));

        $weekly_attendance = $this->checkIfThereAttendanceForToday($student, 'checkin_date', [$lastSaturday, $nextSaturday]);
    }
}
