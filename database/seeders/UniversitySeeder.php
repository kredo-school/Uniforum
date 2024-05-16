<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\University;

class UniversitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        University::insert([
            [
              'name' => 'Kredo University',
            ],
            [
              'name' => 'QQ University',
            ],
            [
              'name' => 'International Christian University',
            ]
        ]);
    }
}
