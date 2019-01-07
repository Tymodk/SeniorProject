<?php

namespace App\Http\Controllers;

use App\Presences;
use App\StudentsCourses;
use DateTime;
use App\Courses;
use App\Imports\UsersImport;
use App\Teachers;
use App\TeachersCourses;
use App\User;
use App\Classes;
use Carbon\Carbon;
use Excel;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Redirect;
use Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Events\addPresence;

class TeachersController extends Controller
{
    public function index()
    {
        $para = Input::all();
        $teachers = Teachers::paginate(10);
        if (Input::get('filter')) {
            if (Input::get('filter') == 'created-first') {
                $teachers = Teachers::OrderBy('created_at', 'ASC')->paginate(10);
            } elseif (Input::get('filter') == 'created-last') {
                $teachers = Teachers::OrderBy('created_at', 'DESC')->paginate(10);
            } else {
                $teachers = Teachers::OrderBy(Input::get('filter'))->paginate(10);
            }

        }
        return view('teachers.index', ['teachers' => $teachers, 'para' => $para]);

    }

    public function create()
    {

        return view('teachers.create');
    }

    public function store()
    {
        $rules = array('name' => 'required');
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        } else {
            if (User::where('email', Input::get('email'))->exists()) {
                return back()
                    ->withErrors(['message' => 'email already exists'])
                    ->withInput();
            }
            try {
                $teacher = new Teachers;
                $teacher->name = Input::get('name');
                $teacher->email = Input::get('email');
                $teacher->password = Input::get('password');
                $teacher->save();

                $user = new User();
                $user->name = Input::get('name');
                $user->email = Input::get('email');
                $user->password = Hash::make(Input::get('password'));
                $user->teacher_id = $teacher->id;
                $user->save();

                broadcast(new addPresence($teacher))->toOthers();
                Session::flash('message', 'Successfully created teacher!');
                return Redirect::to('/admin/teachers');
            } catch (Exception $e) {
                return back()->withInput()->withErrors();
            }

        }
    }

    public function show($id)
    {
        try {
            $teacher = Teachers::findOrFail($id);
            $tc = TeachersCourses::where('teacher_id', $teacher->id)->pluck('course_id');
            $courses = Courses::whereIn('id', $tc)->get();
            return view('teachers.show', ['teacher' => $teacher, 'courses' => $courses]);
        } catch (ModelNotFoundException $e) {
            return back()->withInput()->withErrors();
        }

    }

    public function edit($id)
    {
        try {
            $teacher = Teachers::findOrFail($id);
            return view('teachers.edit')
                ->with('teacher', $teacher);
        } catch (ModelNotFoundException $e) {
            return back()->withInput()->withErrors();
        }

    }

    public function update($id)
    {
        $rules = array('name' => 'required');
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('/teachers/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput();
        } else {
            try {
                $teacher = Teachers::where('id', $id)->firstOrFail();
                $teacher->name = Input::get('name');
                $teacher->email = Input::get('email');
                $teacher->password = Input::get('password');
                $teacher->save();

                Session::flash('message', 'Successfully updated teacher!');
                return Redirect::to('/admin/teachers');
            } catch (Exception $e) {
                return back()->withInput()->withErrors();
            }

        }
    }

    public function destroy($id)
    {
        try {
            $teacher = Teachers::findOrFail($id);
            $user = User::where('teacher_id', $teacher->id)->first();
            $teacher->delete();
            if (isset($user)) {
                $user->delete();
            }


            Session::flash('message', 'Successfully deleted the teacher!');
            return Redirect::to('/admin/teachers');
        } catch (ModelNotFoundException $e) {
            return back()->withInput()->withErrors();
        }

    }

    public function upload(Request $request)
    {
        try {
            Excel::import(new UsersImport, request()->file('excel'), null, \Maatwebsite\Excel\Excel::XLSX);
            $excel = 'test';
            Session::flash('message', 'Successfully uploaded excel file!');
            return Redirect::to('admin/teachers')->withInput(['excel' => $excel]);
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $failures = $e->failures();
            $array = [];

            foreach ($failures as $failure) {
                $failure->row(); // row that went wrong
                $failure->attribute(); // either heading key (if using heading row concern) or column index
                $failure->errors(); // Actual error messages from Laravel validator
            }
            return back()->withInput()->withErrors(['failures' => $failures]);
        }
    }


    public function login()
    {
      $admin = Auth::check() && Auth::user()->isAdmin();

      if($admin)
      {
          return redirect()->route('admin.home');
      }
      else
      {
        $id = Auth::user()->teacher_id;

        $courses = TeachersCourses::where('teacher_id', $id)->pluck('course_id');

        $firstClass = Classes::
        whereIn('course_id', $courses)
            ->where('end_time', '>', date('Y/m/d'))
            ->first();


        $classesActive = Classes::
        whereIn('course_id', $courses)
            ->where('active', 1)
            ->orderBy('start_time')
            ->get();

        $classesToday = Classes::
        whereIn('course_id', $courses)
            ->where('active', 0)
            ->where('end_time', '>', date('Y/m/d'))
            ->where('end_time', '<', date("Y-m-d", strtotime("+1 day")))
            ->orderBy('start_time')
            ->get();

        $classesWeek = Classes::
        whereIn('course_id', $courses)
            ->where('start_time', '>', date("Y-m-d", strtotime("+1 day")))
            ->where('end_time', '<', date("Y-m-d", strtotime("+1 Week")))
            ->orderBy('start_time')
            ->get();


        return view('user.index', [
            'classesToday' => $classesToday,
            'classesThisWeek' => $classesWeek,
            'classesActive' => $classesActive,
            'next' => $firstClass,

        ]);
      }
    }


    public function classes()
    {
      $id = Auth::user()->teacher_id;

        $courses = TeachersCourses::where('teacher_id', $id)->pluck('course_id');

        $firstClass = Classes::
        whereIn('course_id', $courses)
            ->where('end_time', '>', date('Y/m/d'))
            ->first();


        $classesActive = Classes::
        whereIn('course_id', $courses)
            ->where('active', 1)
            ->where('archive', 0)
            ->orderBy('start_time')
            ->get();

        $classesToday = Classes::
        whereIn('course_id', $courses)
            ->where('archive', 0)
            ->where('end_time', '>', date('Y/m/d'))
            ->where('end_time', '<', date("Y-m-d", strtotime("+1 day")))
            ->orderBy('start_time')
            ->get();

        $classesWeek = Classes::
        whereIn('course_id', $courses)
            ->where('archive', 0)
            ->where('start_time', '>', date("Y-m-d", strtotime("+1 day")))
            ->where('end_time', '<', date("Y-m-d", strtotime("+1 Week")))
            ->orderBy('start_time')
            ->get();


        return view('user.index', [
            'classesToday' => $classesToday,
            'classesThisWeek' => $classesWeek,
            'classesActive' => $classesActive,
            'next' => $firstClass,

        ]);
    }

    public function CoursesOverview($slug)
    {
        $course = Courses::where('slug', $slug)->first();
        $classes = Classes::where('course_id',$course->id)->pluck('id');
        $countClasses = Classes::where('course_id', $course->id)->count();
        $students = StudentsCourses::where('course_id', $course->id)->get();
        $aS = StudentsCourses::where('course_id', $course->id)->count();


        //aantal klassen maal studenten = totaal aantal gescande studenten

        $scanned = Presences::whereIn('class_id', $classes)->count();
        $notScanned = $aS - $scanned;

        return view('user.statistics',
            ['total' => $countClasses,
                'students' => $students,
                'course' => $course,
                'scanned'=>$scanned,
                'notScanned' => $notScanned,
                'totalS' => $aS]);
    }


    /* api routes
     *
     *
     *
     *
     *
     *
     */

    public function myClasses()
    {
        #$id = Auth::user()->teacher_id;
        #$courses = TeachersCourses::where('teacher_id', $id)->pluck('course_id');
        $classes = Teachers::get();
        return response()->json($classes);
    }

    public function storeclasses(Request $request)
    {

        $teacher = new Teachers();
        $teacher->name = $request->body;
        $teacher->email = 'testtest' . $request->body;
        $teacher->password = 'fsdfsdf';
        $teacher->save();

        broadcast(new addPresence($teacher))->toOthers();
        return response()->json($teacher);

    }
}
