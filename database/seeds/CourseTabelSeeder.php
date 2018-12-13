<?php

use Illuminate\Database\Seeder;
use App\Courses;

class CourseTabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        include 'Courses.php';
        for ($i=0; $i < count($courses); $i++) {
            Courses::create($courses[$i]);
        }
    }
}
