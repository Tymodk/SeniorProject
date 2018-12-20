<?php

namespace App\Http\Controllers;

use App\Courses;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Students;
use App\Classes;
use App\StudentsCourses;
use App\Presences;

class PresencesController extends Controller
{


    public function store($studentCardID)
    {
        try{
            $student = Students::findOrFail($studentCardID);
            //krijg de les die deze student volgt

            $followedClasses = StudentsCourses::where('student_id', $student->id)->pluck('course_id');
            $classActive = Classes::whereIn('course_id', $followedClasses)->where('active', 1)->first();

            //check of deze actief is
            if (isset($courseActive)) {
                //database aanvullen
                $studentcoursesid = StudentsCourses::where('student_id', $student->id)->where('course_id', $courseActive->course_id)->first();

                $presence = new Presences();
                $presence->students_courses_id = $studentcoursesid->id;
                $presence->class_id = $classActive->id;
                $presence->present = 1;
                $presence->save();

                return response()->json($student);
            }
        }catch(ModelNotFoundException $e){
            return response()->json(Students::first());
        }



    }
}
