<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('course_id');
            $table->unsignedInteger('teachers_courses_id');
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->unsignedInteger('students_courses_id');

            $table->foreign('course_id')->references('id')->on('courses');
            $table->foreign('teachers_courses_id')->references('id')->on('teachers_courses');
            $table->foreign('students_courses_id')->references('id')->on('students_courses');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('classes');
    }
}
