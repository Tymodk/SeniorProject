<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
