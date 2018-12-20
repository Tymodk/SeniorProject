<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(TeacherTabelSeeder::class);
        $this->call(StudentTabelSeeder::class);
        $this->call(CourseTabelSeeder::class);
    }
}
