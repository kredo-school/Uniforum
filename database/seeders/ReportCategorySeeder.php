<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ReportCategory;

class ReportCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ReportCategory::insert([
            [
              'name' => 'Nudity / sexual expression',
            ],
            [
              'name' => 'Suicide / self-harm expression',
            ],
            [
              'name' => 'Hate speech',
            ],
            [
              'name' => 'Predatory behavior',
            ],
            [
              'name' => 'Criminal behavior',
            ],
            [
              'name' => 'Harassment',
            ],
            [
              'name' => 'Cyberbullying',
            ],
            [
              'name' => 'Dangerous behavior',
            ],
            [
              'name' => 'Spam / scam',
            ],
            [
              'name' => 'Impersonation',
            ],
            [
              'name' => 'Misinformation',
            ],
            [
              'name' => 'Other than above',
            ]
        ]);
    }
}
