<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = config('app.userpass');

        $admins = [
            [
                'name' => 'John Gmail',
                'email' => 'jhnwanyoike@gmail.com',
                'email_verified_at' => now(),
                'password' => bcrypt($password),
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'John Icloud',
                'email' => 'jhnwanyoike@icloud.com',
                'email_verified_at' => now(),
                'password' => bcrypt($password),
                'remember_token' => Str::random(10),
            ],
        ];

        foreach ($admins as $admin){
            User::create($admin);
        }
    }
}
