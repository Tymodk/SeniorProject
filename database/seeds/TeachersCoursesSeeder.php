<?php

  use Illuminate\Database\Seeder;

  class TeachersCoursesSeeder extends Seeder {
    public function run() {
      DB::table('teachers_courses')->delete();

      $teachers_courses = [
          [   'course_id'=>'1',
              'teacher_id'=>'5'],
          [   'course_id'=>'2',
              'teacher_id'=>'6'],
          [   'course_id'=>'3',
              'teacher_id'=>'1'],
          [   'course_id'=>'4',
              'teacher_id'=>'3'],
          [   'course_id'=>'4',
              'teacher_id'=>'2'],
          [   'course_id'=>'5',
              'teacher_id'=>'1'],
          [   'course_id'=>'6',
              'teacher_id'=>'4'],
          [   'course_id'=>'7',
              'teacher_id'=>'1'],
          [   'course_id'=>'7',
              'teacher_id'=>'4'],
      ];

      DB::table('teachers_courses')->insert($teachers_courses);
    }
  }
