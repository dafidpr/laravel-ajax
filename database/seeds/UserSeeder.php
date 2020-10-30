<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'      => 'Dafid Prasetyo',
            'username'  => 'dafidpr',
            'password'  => Hash::make(1234),
            'email'     => 'dafid@gmail.com',
        ]);
    }
}
