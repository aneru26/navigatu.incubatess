<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([

            'name' =>'Super Admin',
            'email' =>'navigatu',
            'password' => bcrypt('navigatu123'),
            'user_type' =>'1'
        ]);
    }
}
