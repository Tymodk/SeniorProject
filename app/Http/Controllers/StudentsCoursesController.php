<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Courses;
use App\Students;
use App\StudentsCourses;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Redirect;
use Session;
class StudentsCoursesController extends Controller
{
    //

    public function index()
    {
    	$courses = Courses::select('name')->get();
    	return view('studentcourses.index',['courses'=>$courses]);
    }
     public function addcourse($id)
    {
    	$student = Students::where('id',$id)->first();
        $allcourses = Courses::all();
        //$studentcourses = StudentsCourses::where('student_id',$student->id)->pluck('id')->get();
        //$studentcourses->toArray();
        //$courses = StudentsCourses::whereIn('id',$studentcourses)->get();
    	//$noCourses = StudentsCourses::select('name','id')->whereNotIn('id',$studentcourses)->get();

        //id van vakken die je volg

        $followed = StudentsCourses::where('student_id',$student->id)->pluck('course_id');
        if(count($followed)> 0)
        {

        $followedCourses = Courses::whereIn('id',$followed)->get();

        $notfollowed = Courses::whereNotIn('id',$followed)->get(); 
        }
        else

        {
            $followedCourses = null;
            $notfollowed = Courses::all();
        }



        //id van vakken die je niet volgt

        $studentcourses = null;
    	return view('studentcourses.add',['courses'=>$notfollowed,'student'=>$student ,'followed'=>$followedCourses  ]);
    }

    public function store(Request $request)

    {
        $all = $request->input();
        $userid = $request->input('userid');


        foreach ($all as $key => $value) {
            # code...
            if($key == 'userid' || $key == '_token')
            {
             
            }
            else
            {
                  $new = new StudentsCourses();
                $new->student_id = $userid;
                $new->course_id = $value;
                $new->save(); 
            }
           
        }

        return back()->withInput();
    }

    public function deletecourse($studentid, $courseid)
    {
        #delete course

        return back()->withInput();
    }
}
