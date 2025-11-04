<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(5)->create();

        User::create([
            'name' => 'Harizki',
            'email' => 'rizki23@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('45459898')
        ]);
    }
}