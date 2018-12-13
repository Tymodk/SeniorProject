<?php

namespace App\Http\Controllers;

use App\Presences;
use App\Students;
use App\Courses;
use App\Classes;
use App\StudentsCourses;
use App\Teachers;
use App\TeachersCourses;

use http\Env\Response;
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

        return view('classes.index', ['classes' => $classes, 'active' => $active]);

    }


    public function create()
    {
        $courses = Courses::pluck('name', 'id');
        return view('classes.create', ['courses' => $courses]);
    }

    public function edit($id)
    {
        return view('');
    }

    public function show($id)
    {
        $class = Classes::where('id', $id)->firstOrFail();

        $teachers = TeachersCourses::where('course_id', $class->course_id)->pluck('teacher_id');
        $teachers = Teachers::whereIn('id', $teachers)->get();

        $totalStudents = StudentsCourses::where('course_id', $class->course_id)->count();

        return view('classes.show', ['teachers' => $teachers, 'students' => $totalStudents, 'class' => $class]);


    }

    public function store(Request $request)
    {
        //carbon gebruiken


        $startdate = $request->startdate . ' ' . $request->starthour;
        $enddate = $request->enddate . ' ' . $request->endhour;

        $course = $request->course;


        return view('');
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
        #get active of current user
        $teachercourse = TeachersCourses::where('teacher_id', Auth::id())->pluck('course_id');

        $class = Classes::where('active', 1)->whereIn('course_id', $teachercourse)->first();

        // get al students that have this class and are not registered

        $allStudents = StudentsCourses::where('course_id', $class->course_id)->get();


        $notPresent = '';
        return view('user.overview', ['notpresent' => $allStudents, 'class' => $class]);

    }

    public function api_class_absent($classid)
    {

        $presentStudentsCourses = Presences::select('students_courses_id')->where('class_id', $classid)->get();

        if(isset($presentStudentsCourses))
        {
            $studentCourse = StudentsCourses::whereNotIn('id', $presentStudentsCourses)->pluck('student_id');
            $present = Students::whereIn('id',$studentCourse)->get();
            return response()->json($present);
        }
        else
        {
            return response()->json($presentStudentsCourses);
        }


    }

    public function api_class_present($classid)
    {

        $presentStudentsCourses = Presences::select('students_courses_id')->where('class_id', $classid)->get();

        if(isset($presentStudentsCourses))
        {
            $studentCourse = StudentsCourses::whereIn('id', $presentStudentsCourses)->pluck('student_id');
            $present = Students::whereIn('id',$studentCourse)->get();
            return response()->json($present);
        }
        else
        {
            return response()->json($presentStudentsCourses);
        }




    }
}
