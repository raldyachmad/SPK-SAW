<?php

namespace Database\Seeders;

use App\Models\Criteria;
use App\Models\Santri;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory()->create();
        // Santri::factory(100)->create();
        // Criteria::factory(5)->create();

        User::create([
            "name" => "Super Admin",
            "email" => "super@gmail.com",
            "password" => Hash::make('katasandi'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);
    }
}
