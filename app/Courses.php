<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\StudentsCourses;
use App\Presences;
use App\Classes;
class Courses extends Model
{

    public function average()
    {
        $classes = Classes::where('course_id',$this->id)->get();
        $students = StudentsCourses::where('course_id',$this->id)->count();

        // 5 classes, 1 class heeft 20 studenten. In totaal 100 aanwezigheden.

        $avr = array();

        foreach ($classes as $value)
        {
            $totalStudents = $students;
            $presence = Presences::where('class_id',$value->id)->where('present',1)->count();

            $average = $presence / $totalStudents * 100;
            $avr[]=$average;
        }

        foreach ($avr as $value)
        {
            $total =+ $value;

        }
        $final = $total/count($avr);
        return $students;
    }
}
