<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Classes extends Model
{
    //

    public function Course()
    {
        return $this->belongsTo('App\Courses', 'course_id');
    }


    public function difference()
    {
        $dtEnd = Carbon::parse($this->end_time);
        $dtStart = Carbon::parse($this->start_time);
        $end = $dtStart->diff($dtEnd)->format('%H:%i:%s');
        return $end;
    }
}

