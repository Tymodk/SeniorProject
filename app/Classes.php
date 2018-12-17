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

    public function start()
    {
        $date = Carbon::parse($this->start_time)->format('Y-m-d');
        $date2 = Carbon::parse($this->start_time)->format('H:i');
        $final = $date . 'T'. $date2;

        return $final;
    }

    public function end()
    {
        $date = Carbon::parse($this->end_time)->format('Y-m-d');
        $date2 = Carbon::parse($this->end_time)->format('H:i');
        $final = $date . 'T'. $date2;

        return $final;
    }
}

