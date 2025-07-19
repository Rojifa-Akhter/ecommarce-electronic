<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::truncate();

        User::create([
            'name' => 'Admin User',
            'role' => 'admin',
            'email' => 'rojr02054@gmail.com',
            'password' => Hash::make('password'),
            'status' => 'active',
        ]);

        User::create([
            'name' => 'Regular User',
            'role' => 'user',
            'email' => 'user@gmail.com',
            'password' => Hash::make('password'),
            'status' => 'active',
        ]);
    }
}
