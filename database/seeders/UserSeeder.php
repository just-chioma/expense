<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Chinelo',
            'email' => 'chinelo@gmail.com',
            'password' => Hash::make('password123'),
            'role'=>0
        ]);

        
        User::create([
            'name' => 'Amanda',
            'email' => 'ama@gmail.com',
            'password' => Hash::make('password123'),
             'role'=>0
        ]);

        
        User::create([
            'name' => 'Gift',
            'email' => 'gift@gmail.com',
            'password' => Hash::make('password123'),
             'role'=>0
        ]);

        
        User::create([
            'name' => 'Favour',
            'email' => 'favour@gmail.com',
            'password' => Hash::make('password123'),
             'role'=>5
        ]);

        
        User::create([
            'name' => 'Chris',
            'email' => 'chris@gmail.com',
            'password' => Hash::make('password123'),
            'role'=>0
        ]);




    }
}
