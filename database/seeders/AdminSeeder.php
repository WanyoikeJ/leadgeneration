<?php

namespace Database\Seeders;

use App\Models\Admin\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = config('app.adminpass');

        $admins = [
            [
                'name' => 'Kelvin Gmail',
                'email' => 'jhnwanyoike@gmail.com',
                'email_verified_at' => now(),
                'password' => bcrypt($password),
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'Kelvin Icloud',
                'email' => 'jhnwanyoike@icloud.com',
                'email_verified_at' => now(),
                'password' => bcrypt($password),
                'remember_token' => Str::random(10),
            ],
        ];

        foreach ($admins as $admin){
            Admin::create($admin);
        }
    }
}
