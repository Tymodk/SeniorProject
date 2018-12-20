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
            $followedCourses = StudentsCourses::where('student_id', $student->id)->pluck('course_id');
            $classActive = Classes::whereIn('course_id', $followedCourses)->where('active', 1)->first();
            $notScanned = Presences::where('student_id',$student->id)->where('class_id',$classActive->id)->count();
            if (isset($classActive) && $notScanned < 1 ) {

                $presence = new Presences();
                $presence->students_id = $student->id;
                $presence->class_id = $classActive->id;
                $presence->present = 1;
                $presence->save();




                event(new addPresence($student,$classActive));


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
