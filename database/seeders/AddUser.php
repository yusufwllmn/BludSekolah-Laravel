<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AddUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       User::insert([
        'name' => 'Admin',
        'email' => 'admin@gmail.com',
        'password'  => Hash::make('admin123'),
        'role'  => 'Admin'
       ]);
    }
}
