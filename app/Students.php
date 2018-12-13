<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    //
    public function studentcourses()
    {
        return $this->hasMany('App\StudentsCourses','student_id');
    }
}
