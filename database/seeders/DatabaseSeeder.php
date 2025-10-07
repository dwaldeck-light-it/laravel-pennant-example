<?php

declare(strict_types=1);

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        UserFactory::new()->create([
            'email' => "user1@test.com",
            'is_beta_tester' => true
        ]);
        UserFactory::new()->create([
            'email' => "user2@test.com",
            'is_beta_tester' => false
        ]);
    }
}
