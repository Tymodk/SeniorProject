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
        try {
            $class = Classes::findOrFail($id);

            $teachers = TeachersCourses::where('course_id', $class->course_id)->pluck('teacher_id');
            $teachers = Teachers::whereIn('id', $teachers)->get();

            $totalStudents = StudentsCourses::where('course_id', $class->course_id)->count();

            return view('classes.show', ['teachers' => $teachers, 'students' => $totalStudents, 'class' => $class]);

        } catch (ModelNotFoundException $e) {
            return back()->withInput()->withErrors('message', 'Class not found');
        }


    }

    public function store(Request $request)
    {
        $startTime = substr($request->start, 11);
        $startDate = substr($request->start, 0, 10);
        $start = $startTime . ' ' . $startDate;

        $endTime = substr($request->end, 11);
        $endDate = substr($request->end, 0, 10);

        $end = $endTime . ' ' . $endDate;
        $repeat1 = $request->repeat1;
        $repeat2 = $request->repeat2;
        $repeat3 = $request->repeat3;
        $repeat4 = $request->repeat4;

        $newClass = new Classes();
        $newClass->start_time = Carbon::parse($start);
        $newClass->end_time = Carbon::parse($end);
        $newClass->course_id = $request->course;
        $newClass->active = 0;
        $newClass->save();

        if ($repeat1) {
            while ($startDate < "2019-09-10") {
                $startDate = date("Y-m-d", strtotime("$startDate +1 week"));
                $endDate = date("Y-m-d", strtotime("$endDate +1 week"));
            }
            while ($startDate < "2018-10-20") {
                $startDate = date("Y-m-d", strtotime("$startDate +1 week"));
                $endDate = date("Y-m-d", strtotime("$endDate +1 week"));

                $end = $endTime . ' ' . $endDate;
                $start = $startTime . ' ' . $startDate;

                $newClass = new Classes();
                $newClass->start_time = Carbon::parse($start);
                $newClass->end_time = Carbon::parse($end);
                $newClass->course_id = $request->course;
                $newClass->active = 0;
                $newClass->save();
            }
        }
        if ($repeat2) {
            while ($startDate < "2018-11-12") {
                $startDate = date("Y-m-d", strtotime("$startDate +1 week"));
                $endDate = date("Y-m-d", strtotime("$endDate +1 week"));
            }
            while ($startDate < "2019-01-05") {
                $startDate = date("Y-m-d", strtotime("$startDate +1 week"));
                $endDate = date("Y-m-d", strtotime("$endDate +1 week"));

                $end = $endTime . ' ' . $endDate;
                $start = $startTime . ' ' . $startDate;

                $newClass = new Classes();
                $newClass->start_time = Carbon::parse($start);
                $newClass->end_time = Carbon::parse($end);
                $newClass->course_id = $request->course;
                $newClass->active = 0;
                $newClass->save();
            }
        }

        if ($repeat3) {
            while ($startDate < "2019-01-21") {
                $startDate = date("Y-m-d", strtotime("$startDate +1 week"));
                $endDate = date("Y-m-d", strtotime("$endDate +1 week"));
            }
            while ($startDate < "2019-03-09") {
                $startDate = date("Y-m-d", strtotime("$startDate +1 week"));
                $endDate = date("Y-m-d", strtotime("$endDate +1 week"));

                $end = $endTime . ' ' . $endDate;
                $start = $startTime . ' ' . $startDate;

                $newClass = new Classes();
                $newClass->start_time = Carbon::parse($start);
                $newClass->end_time = Carbon::parse($end);
                $newClass->course_id = $request->course;
                $newClass->active = 0;
                $newClass->save();
            }
        }

        if ($repeat4) {
            while ($startDate < "2019-03-25") {
                $startDate = date("Y-m-d", strtotime("$startDate +1 week"));
                $endDate = date("Y-m-d", strtotime("$endDate +1 week"));
            }
            while ($startDate < "2019-05-18") {
                $startDate = date("Y-m-d", strtotime("$startDate +1 week"));
                $endDate = date("Y-m-d", strtotime("$endDate +1 week"));

                $end = $endTime . ' ' . $endDate;
                $start = $startTime . ' ' . $startDate;

                $newClass = new Classes();
                $newClass->start_time = Carbon::parse($start);
                $newClass->end_time = Carbon::parse($end);
                $newClass->course_id = $request->course;
                $newClass->active = 0;
                $newClass->save();
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
    public function teacherEdit($id)
    {
        $class = Classes::where('id',$id)->first();
        return view('user.edit',['class'=>$class]);
    }

    public function teacherEditSave(Request $request)
    {

        $class = Classes::find($request->classid);

        $startTime = substr($request->start, 11);
        $startDate = substr($request->start, 0, 10);
        $start = $startTime . ' ' . $startDate;

        $endTime = substr($request->end, 11);
        $endDate = substr($request->end, 0, 10);

        $end = $endTime . ' ' . $endDate;

        $class->start_time = Carbon::parse($start);
        $class->end_time = Carbon::parse($end);

        $class->save();
        Session::flash('message', 'Je les is succesvol gewijzigd!');

        return redirect()->route('user.index');
    }


    public function start(Request $request)
    {

        $class = Classes::where('id', $request->classid)->first();

        $class->active = 1;
        $class->save();

        //$active = Classes::where('active', 1)->get();
        return $this->overview();
    }

    public function stop($class)
    {
        $class = Classes::where('id', $class)->first();
        $class->archive = 1;
        $class->active = 0;
        $class->save();

        return redirect()->route('user.home');
    }

    public function overview()
    {

        $teachercourse = TeachersCourses::where('teacher_id', Auth::user()->teacherid())->pluck('course_id');
        $class = Classes::where('active', 1)->whereIn('course_id', $teachercourse)->first();


        $allStudents = StudentsCourses::where('course_id', $class->course_id)->get();


        return view('user.overview', ['notpresent' => $allStudents, 'class' => $class]);

    }


    public function classesPerTeacher()
    {
        $teacherCourses = TeachersCourses::where('teacher_id', Auth::user()->teacherid())->pluck('course_id');
        $courses = Courses::whereIn('id', $teacherCourses)->get();

        return view('user.courses', ['courses' => $courses]);
    }


    public function archive()
    {
        $courses = TeachersCourses::where('teacher_id', Auth::user()->teacherid())->pluck('course_id');
        $classes = Classes::whereIn('course_id', $courses)->where('archive', 1)->orderBy('created_at')->get();
        return view('user.archive', ['classes' => $classes]);
    }

    public function archiveDetail($class)
    {
        $class = Classes::where('id', $class)->first();
        $present = Presences::where('class_id', $class->id)->where('present', 1)->get();
        $pres = Presences::where('class_id', $class->id)->where('present', 1)->pluck('student_id');

        $ill = Presences::where('class_id', $class->id)->where('ill', 1)->get();
        $illgroup = Presences::where('class_id', $class->id)->where('ill', 1)->pluck('student_id');

        $absent = StudentsCourses::where('course_id', $class->course_id)->whereNotIn('student_id', $pres)->whereNotIn('student_id', $illgroup)->get();

        return view('user.archiveOverview',
            ['class' => $class,
                'present' => $present,
                'absent' => $absent,
                'ill' => $ill]);
    }


    public function manual($class, $student)
    {
        $presence = new Presences();
        $presence->student_id = $student;
        $presence->class_id = $class;
        $presence->present = 1;
        $presence->save();
        return response()->json($presence);
    }

    public function manualDelete($class, $student)
    {
        $presence = Presences::where('class_id', $class)->where('student_id', $student)->first();

        $presence->delete();
        return response()->json($presence);
    }

    public function manualIll($class, $student)
    {
        $presence = new Presences();
        $presence->class_id = $class;
        $presence->student_id = $student;
        $presence->ill = 1;
        $presence->save();
        return response()->json($presence);
    }

    public function api_class_absent($classid)
    {
        $class = Classes::where('id', $classid)->first();
        $presence = Presences::where('class_id', $classid)->where('present', 1)->orWhere('ill', 1)->pluck('student_id');
        $studentsVakWel = StudentsCourses::where('course_id',$class->course_id)->whereNotIn('student_id',$presence)->pluck('student_id');
        $studentC = Students::whereIn('id', $studentsVakWel)->get();


        return response()->json($studentC);

    }

    public function api_class_present($classid)
    {

        $presentStudentsCourses = Presences::select('student_id')->where('class_id', $classid)->where('present', 1)->get();

        if (isset($presentStudentsCourses)) {
            $studentCourse = StudentsCourses::whereIn('id', $presentStudentsCourses)->pluck('student_id');
            $present = Students::whereIn('id', $studentCourse)->get();
            $test = Presences::where('class_id', $classid)->where('present', 1)
                ->join('students', 'student_id', '=', 'students.id')->select('presences.*', 'students.name', 'students.card_id')->get();
            return response()->json($test);
        } else {
            return response()->json($presentStudentsCourses);
        }


    }

    public function api_class_ill($classid)
    {
        $ill = Presences::where('class_id', $classid)->where('ill', 1)->pluck('student_id');
        $result = Students::whereIn('id', $ill)->get();
        return response()->json($result);
    }
}
