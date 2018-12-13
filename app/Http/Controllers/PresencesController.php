<?php

namespace App\Http\Controllers;

use App\Courses;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Students;
use App\Classes;
use App\StudentsCourses;
use App\Presences;
use App\Events\addPresence;
class PresencesController extends Controller
{


    public function store($studentCardID)
    {
        try{
            $student = Students::where('card_id',$studentCardID)->first();
            //krijg de les die deze student volgt

            $followedCourses = StudentsCourses::where('student_id', $student->id)->pluck('course_id');
            $classActive = Classes::whereIn('course_id', $followedCourses)->where('active', 1)->first();

            //check of deze actief is
            if (isset($classActive)) {
                //database aanvullen
                $studentcoursesid = StudentsCourses::where('student_id', $student->id)->where('course_id', $classActive->course_id)->first();

                $presence = new Presences();
                $presence->students_courses_id = $studentcoursesid->id;
                $presence->class_id = $classActive->id;
                $presence->present = 1;
                $presence->save();


                //event aanroepen

                event(new addPresence());


                return response()->json($student);
            }
            else
            {
                return "nog niet gelukt maar ge bent er bijna!";
            }
        }catch(ModelNotFoundException $e){
            return "niet gelukt";
        }



    }
}
