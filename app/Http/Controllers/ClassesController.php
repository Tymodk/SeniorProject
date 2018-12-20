<?php

namespace App\Http\Controllers;

use App\Presences;
use App\Students;
use App\Courses;
use App\Classes;
use App\StudentsCourses;
use App\Teachers;
use App\TeachersCourses;

use Carbon\Carbon;
use http\Env\Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Redirect;
use Session;
use Illuminate\Support\Facades\Auth;

class ClassesController extends Controller
{
    public function index()
    {

        $classes = Classes::paginate(15);

        return view('classes.index', ['classes' => $classes]);

    }


    public function create()
    {
        $courses = Courses::pluck('name', 'id');
        return view('classes.create', ['courses' => $courses]);
    }

    public function edit($id)
    {
        $class = Classes::find($id);
        $courses = Courses::pluck('name', 'id');
        return view('classes.edit', ['class' => $class, 'courses' => $courses]);
    }

    public function show($id)
    {
        try{
            $class = Classes::findOrFail($id);

            $teachers = TeachersCourses::where('course_id', $class->course_id)->pluck('teacher_id');
            $teachers = Teachers::whereIn('id', $teachers)->get();

            $totalStudents = StudentsCourses::where('course_id', $class->course_id)->count();

            return view('classes.show', ['teachers' => $teachers, 'students' => $totalStudents, 'class' => $class]);

        }catch (ModelNotFoundException $e){
            return back()->withInput()->withErrors('message','Class not found');
        }


    }

    public function store(Request $request)
    {
        $startTime = substr($request->start, 11);
        $startDate = substr($request->start, 0, 10);
        $start = $startDate . ' ' . $startTime;

        $endTime = substr($request->end, 11);
        $endDate = substr($request->end, 0, 10);

        $end = $endDate . ' ' . $endTime;
        $repeat1 = $request->repeat1;

        $start2 = $start;
        $end2 = $end;
        if ($repeat1) {
          for ($i=0; $i < 6; $i++) {
            $newClass = new Classes();
            $newClass->start_time = Carbon::parse($start2);
            $newClass->end_time = Carbon::parse($end2);
            $newClass->course_id = $request->course;
            $newClass->active = 0;
            $newClass->save();

            $startdate = date("Y/m/d", strtotime("$start2 +1 week"));
            $enddate = date("Y/m/d", strtotime("$end2 +1 week"));
          }
        }



        Session::flash('message', $request->start);
        return Redirect::to('/admin/classes');
    }

    public function update(Request $request)
    {
        $class = Classes::find($request->id);

        $start = substr($request->start, 11);
        $end = substr($request->start, 0, 10);
        $start = $start . ' ' . $end;

        $start2 = substr($request->end, 11);
        $end = substr($request->end, 0, 10);
        $start2 = $start2 . ' ' . $end;

        $class->start_time = Carbon::parse($start);
        $class->end_time = Carbon::parse($start2);
        $class->course_id = $request->course;
        $class->save();

        Session::flash('message', 'Successfully updated class!');
        return Redirect::to('/admin/classes');
    }

    public function delete($id)
    {
        $class = Classes::find($id);
        $class->delete();
        return back()->withInput();
    }

    public function excelUpload()
    {
        #fill database with excel file

        #validation!!

    }


    public function start(Request $request)
    {

        $class = Classes::where('id', $request->classid)->first();

        $class->active = 1;
        $class->save();

        $active = Classes::where('active', 1)->get();
        return back()->withInput()->with(['active' => $active]);
    }

    public function overview()
    {

        $teachercourse = TeachersCourses::where('teacher_id', Auth::user()->teacherid())->pluck('course_id');
        $class = Classes::where('active', 1)->whereIn('course_id', $teachercourse)->first();
        $allStudents = StudentsCourses::where('course_id', $class)->get();
        return view('user.overview', ['notpresent' => $allStudents, 'class' => $class]);

    }


    public function classesPerTeacher()
    {

    }

    public function api_class_absent($classid)
    {
        $class = Classes::where('id', $classid)->first();
        $presence = Presences::where('class_id', $classid)->where('present', 1)->pluck('students_courses_id');
        $studentC = StudentsCourses::whereNotIn('id', $presence)->where('course_id', $class->course_id)->pluck('student_id');
        $notPresentStudents = Students::whereIn('id', $studentC)->get();

        return response()->json($notPresentStudents);

    }

    public function api_class_present($classid)
    {

        $presentStudentsCourses = Presences::select('students_courses_id')->where('class_id', $classid)->where('present', 1)->get();

        if (isset($presentStudentsCourses)) {
            $studentCourse = StudentsCourses::whereIn('id', $presentStudentsCourses)->pluck('student_id');
            $present = Students::whereIn('id', $studentCourse)->get();
            return response()->json($present);
        } else {
            return response()->json($presentStudentsCourses);
        }


    }
}
