<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\TeachersCourses;
class Teachers extends Model
{
   
     protected $fillable = [
        'name', 'email', 'password',
    ];

     public function courses()
     {
         return $this->belongsToMany('App\TeachersCourses','teacher_id');
     }
}
