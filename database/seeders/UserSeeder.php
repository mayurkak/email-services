<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Mayur Kakde',
                'email' => 'mayur@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'), // hashed password
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'venu Kakde',
                'email' => 'venu@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'), // hashed password
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],                   
        ]);
    }
}
