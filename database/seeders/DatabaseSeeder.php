<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Odai',
            'username' => 'johndoe',
            'email' => 'odai@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123123123'), // Set a secure password
            'status' => 'active',
            'role' => '1',
            'remember_token' => null,
        ]);
    }
}
