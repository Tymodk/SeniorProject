<?php

use Illuminate\Database\Seeder;
use App\Teachers;
use App\User;
class TeacherTabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {
        //
        include 'Teachers.php';
        for ($i=0; $i < count($teachers); $i++) {
            $teacher =  Teachers::create($teachers[$i]);

            User::create([
                'name'=> $teacher->name,
                'email' => $teacher->email,
                'password' => Hash::make($teacher->password),
                'teacher_id'=> $teacher->id

            ]);
        }

    }
}
