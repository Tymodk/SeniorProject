<?php

namespace App\Console\Commands;

use App\Admin;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
class CreateAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create admin if not already exists';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //

        if (!User::where('email', '=', env('ADMIN_EMAIL'))->exists()) {
            // user found
            User::create([
                'email'    => env('ADMIN_EMAIL'),
                'password' => Hash::make(env('ADMIN_PASSWORD')),
                'name'=>'admin',

            ]);

            $userid = User::where('email', env('ADMIN_EMAIL'))->first();
            Admin::create(['user_id' => $userid->id]);
            echo('Admin created');
        }
        else
        {
            echo('Admin already exists');
        }

    }
}
