<?php

namespace App\Http\Controllers;

use App\Courses;
use App\Teachers;
use App\TeachersCourses;
use Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Redirect;
use Session;

class TeachersCoursesController extends Controller
{

    #link course with teacher visa versa

    public function index()
    {
        $courses = Courses::all();

        $data = $courses;
        return view('teachercourses.index', ['data' => $data]);
    }

    public function single($id)
    {
        $course = Courses::where('id',$id)->firstOrFail();

        $teachers = TeachersCourses::where('course_id',$course->id)->pluck('teacher_id');

        $teachersinfo = Teachers::whereIn('id',$teachers)->get();


        return view('teachercourses.show',['course'=>$course,'teachers'=>$teachersinfo]);
    }


    public function deleteCourse($teacherid,$courseid)
    {
        $item = TeachersCourses::where('teacher_id',$teacherid)->where('course_id',$courseid)->first();
        $item->delete();

        return back()->withInput(); 
    }

    
    public function addCourse($id)
    {
        $teacher = Teachers::where('id',$id)->firstOrFail();
        $tCourses = TeachersCourses::where('teacher_id',$id)->pluck('course_id');

        $coursesleft = Courses::WhereNotIn('id',$tCourses)->pluck('name','id');


        return view('teachercourses.create',['courses'=>$coursesleft,'teacher'=>$teacher]);
    }
  

    public function store(Request $request)
    {
        $new = new TeachersCourses();

        $new->course_id = $request->input('courseid') ;
        $new->teacher_id = $request->input('teacherid');
        $new->save();
      return redirect()->action('TeachersCourses@index');
    }

    public function teacher($id)
    {
        $courses = TeachersCourses::where('teacher_id',$id)->pluck('course_id');
        $coursesinfo = Courses::whereIn('id',$courses)->get();
        $teacher = Teachers::where('id',$id)->first();
        return view('teachers.courses',['courses'=>$coursesinfo,'teacher'=>$teacher]);
    }


    public function storeCourse(Request $request)
    {
        foreach($request->input('courses') as $value)
        {
            $course = new TeachersCourses();
            $course->teacher_id = $request->input('id');
             $course->course_id = $value;
             $course->save();
        }

        return view('studentcourses.test',['test'=>$request->input('courses')]);

    }

    public function delete()
    {
        return;
    }

}
