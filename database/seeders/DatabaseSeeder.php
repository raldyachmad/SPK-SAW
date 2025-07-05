<?php

namespace Database\Seeders;

use App\Models\Criteria;
use App\Models\Santri;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

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
            "role" => "superadmin",
            "password" => Hash::make('katasandi'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);
        // DB::table('criterias')->insert([
        //     [
        //         'nama' => 'Nilai Raport',
        //         'bobot' => 0.30,
        //         'atribut' => 'benefit',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'nama' => 'Nilai Ujian Tahfidz Akhir',
        //         'bobot' => 0.25,
        //         'atribut' => 'benefit',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'nama' => 'Kehadiran',
        //         'bobot' => 0.15,
        //         'atribut' => 'benefit',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'nama' => 'Kedisiplinan',
        //         'bobot' => 0.15,
        //         'atribut' => 'benefit',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'nama' => 'Sikap/Akhlak',
        //         'bobot' => 0.15,
        //         'atribut' => 'benefit',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        // ]);

        // for ($santriId = 1; $santriId <= 100; $santriId++) {
        //     // ID kriteria dari 1 hingga 5
        //     for ($kriteriaId = 1; $kriteriaId <= 5; $kriteriaId++) {
        //         DB::table('penilaians')->insert([
        //             'santri_id' => $santriId,
        //             'criteria_id' => $kriteriaId,
        //             'nilai' => rand(60, 100), // nilai acak antara 60–100
        //             'created_at' => now(),
        //             'updated_at' => now(),
        //         ]);
        //     }
        // }
    }
}
