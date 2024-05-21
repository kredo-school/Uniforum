<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::insert([
            [
              'name' => 'event',
            ],
            [
              'name' => 'job hunting',
            ],
            [
              'name' => 'club/activity',
            ],
            [
              'name' => 'course/class',
            ],
            [
              'name' => 'study abroad',
            ],
            [
              'name' => 'career',
            ],
            [
              'name' => 'others',
            ]
        ]);
    }
}
