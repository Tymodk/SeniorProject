<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeachersCourses extends Model
{
  public function teacher()
  {
     return $this->belongsTo('App\Teachers','teacher_id');
  }

  public function course()
  {
     return $this->belongsTo('App\Courses','course_id');
  }
}
