<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        User::factory()->create([
            'fullName' => 'Test User',
            'email' => 'test@example.com',
            'role' => 'intern', 
            'educationalLevel' => 'Bachelor\'s Degree',
            'bioInfo' => ['interests' => 'Coding', 'goals' => 'Become a software engineer'],
            'skills' => ['PHP', 'Laravel'],
        ]);
    }
}
