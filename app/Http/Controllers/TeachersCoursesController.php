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
        #get all courses
        $courses = TeachersCourses::all();
        $data2= array();
        foreach ($courses as $value) {
        	$coursename= Courses::select('name')->where('id',$value->course_id)->first();
        	if(!array_key_exists($coursename->name, $data2))
        	{
        			$data2[$coursename->name] = '' ;
        		
        	}

        }
        foreach ($courses as $value) {
        	$teachername = Teachers::select('name')->where('id',$value->teacher_id)->first();
        	$coursename= Courses::select('name')->where('id',$value->course_id)->first();
        	$data2[$coursename->name] =  $data2[$coursename->name] . ' ' .$teachername->name;

        }

        #for loop

        $data = $courses;
        return view('teachercourses.index', ['data' => $data,'data2'=>$data2]);
    }

    public function single($id)
    {
        $tCourses = TeachersCourses::where('teacher_id',$id)->pluck('course_id');
        $tCourses = $tCourses->toArray();

        $courses = Courses::whereIn('id',$tCourses)->get();
        $teacher = Teachers::select('name','id')->where('id',$id)->first();


        return view('teachers.courses',['data'=>$courses,'teacher'=>$teacher]);
    }


    public function deleteCourse($teacherid,$courseid)
    {
        $item = TeachersCourses::where('teacher_id',$teacherid)->where('course_id',$courseid)->first();
        $item->delete();

        return back()->withInput(); 
    }


    public function teacherLink()
    {
        #create view
        #link teacher to a course
        return;
    }
    public function courseLink()
    {
        #link course to a teacher
        #create view
        return;
    }

    public function store()
    {
        return;
    }

    public function show()
    {
        return;
    }
    public function delete()
    {
        return;
    }

}
