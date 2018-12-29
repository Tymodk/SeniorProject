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
use Illuminate\Support\Facades\Input;
class PresencesController extends Controller
{


    public function store(Request $request)
    {
        $studentCardID = Input::get('arduino_id');
        try{
            $student = Students::where('card_id',$studentCardID)->first();
            $followedCourses = StudentsCourses::where('student_id', $student->id)->pluck('course_id');
            $classActive = Classes::whereIn('course_id', $followedCourses)->where('active', 1)->first();
            $notScanned = Presences::where('student_id',$student->id)->where('class_id',$classActive->id)->count();
            if (isset($classActive) && $notScanned < 1 ) {

                $presence = new Presences();
                $presence->student_id = $student->id;
                $presence->class_id = $classActive->id;
                $presence->present = 1;
                $presence->save();




                event(new addPresence($student,$classActive));

                return response("gelukt");

            }
            else
            {
                return response("gelukt");
            }
        }catch(ModelNotFoundException $e){
            return response("gelukt");
        }



    }
}
