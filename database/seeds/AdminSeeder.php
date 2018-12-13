<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Admin;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = User::create([
            'name'=> 'Admin',
            'email' => env('ADMIN_EMAIL'),
            'password' => Hash::make(env('ADMIN_PASSWORD')),

        ]);
        Admin::create([
            'user_id'=> $user->id
        ]);

    }
}
