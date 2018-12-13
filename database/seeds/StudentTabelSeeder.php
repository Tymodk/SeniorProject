<?php

use Illuminate\Database\Seeder;
use App\Students;
class StudentTabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        include 'Students.php';
        for ($i=0; $i < count($students); $i++) {
            Students::create($students[$i]);
        }

    }
}
