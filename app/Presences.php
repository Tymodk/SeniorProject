<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Students;
class Presences extends Model
{
    //

    public function student()
    {
        return $this->belongsTo('App\Students','student_id');
    }
}
