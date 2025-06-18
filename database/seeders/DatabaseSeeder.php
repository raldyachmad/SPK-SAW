<?php

namespace Database\Seeders;

use App\Models\Criteria;
use App\Models\Santri;
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
        User::factory()->create();
        Santri::factory(100)->create();
        Criteria::factory(5)->create();
    }
}
