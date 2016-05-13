<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $user = new App\User;
        $user->name = 'admin';
        $user->email = 'admin@admin.com';
        $user->password = 'admin123';
        $user->save();
    }
}