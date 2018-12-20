<?php

  use Illuminate\Database\Seeder;

  class StudentsCoursesSeeder extends Seeder {
    public function run() {
      DB::table('students_courses')->delete();

      $students_courses = [
          [   'course_id'=>'1',
              'student_id'=>'1'],
          [   'course_id'=>'1',
              'student_id'=>'2'],
          [   'course_id'=>'1',
              'student_id'=>'3'],
          [   'course_id'=>'2',
              'student_id'=>'1'],
          [   'course_id'=>'2',
              'student_id'=>'2'],
          [   'course_id'=>'2',
              'student_id'=>'3'],
          [   'course_id'=>'3',
              'student_id'=>'1'],
          [   'course_id'=>'3',
              'student_id'=>'2'],
          [   'course_id'=>'3',
              'student_id'=>'4'],
          [   'course_id'=>'4',
              'student_id'=>'1'],
          [   'course_id'=>'4',
              'student_id'=>'2'],
          [   'course_id'=>'4',
              'student_id'=>'3'],
          [   'course_id'=>'4',
              'student_id'=>'4'],
          [   'course_id'=>'5',
              'student_id'=>'1'],
          [   'course_id'=>'5',
              'student_id'=>'2'],
          [   'course_id'=>'5',
              'student_id'=>'3'],
          [   'course_id'=>'6',
              'student_id'=>'1'],
          [   'course_id'=>'6',
              'student_id'=>'2'],
          [   'course_id'=>'7',
              'student_id'=>'1'],
          [   'course_id'=>'7',
              'student_id'=>'2'],
          [   'course_id'=>'7',
              'student_id'=>'3'],
          [   'course_id'=>'7',
              'student_id'=>'4'],
      ];

      DB::table('students_courses')->insert($students_courses);
    }
  }
