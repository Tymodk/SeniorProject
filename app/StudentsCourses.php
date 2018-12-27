<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Presences;
use App\Classes;
class StudentsCourses extends Model
{
    //

    public function student()
    {
       return $this->belongsTo('App\Students','student_id');
    }

    public function course()
    {
       return $this->belongsTo('App\Courses','course_id');
    }


    public function countPresence($courseId)
    {

        $classes = Classes::where('course_id',$courseId)->pluck('id');
        $total = Presences::where('student_id',$this->id)->where('present',1)->whereIn('class_id',$classes)->count();

        return $total;
    }
}
