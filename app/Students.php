<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    protected $fillable = [
        'name', 'card_id',
    ];

    public function studentcourses()
    {
        return $this->hasMany('App\StudentsCourses','student_id');
    }
}
