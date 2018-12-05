<?php

namespace App\Http\Controllers;

use App\Students;
use App\Courses;
use App\Classes;
use App\StudentsCourses;
use App\Teachers;
use App\TeachersCourses;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Redirect;
use Session;

class ClassesController extends Controller
{
    public function index()
    {

        $classes = Classes::paginate(15);
        return view('classes.index',['classes'=>$classes]);

    }
    public function create()
    {
        return view('classes.create');
    }
    public function edit($id)
    {
        return view('');
    }
    public function show($id)
    {
        $class = Classes::where('id',$id)->firstOrFail();

        $teachers = TeachersCourses::where('course_id', $class->course_id)->pluck('teacher_id');
        $teachers = Teachers::whereIn('id',$teachers)->get();

        $totalStudents = StudentsCourses::where('course_id',$class->course_id)->count();

        return view('classes.show',['teachers'=>$teachers,'students'=>$totalStudents,'class'=>$class]);


    }
    public function store()
    {
        return view('');
    }

    public function excelUpload()
    {
        #fill database with excel file

        #validation!!

    }


}
