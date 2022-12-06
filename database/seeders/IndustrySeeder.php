<?php

namespace Database\Seeders;

use App\Models\Industry;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class IndustrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $industries = [
            ['industry_name' => 'Software Engineering'],
            ['industry_name' => 'Mobile App Development'],
            ['industry_name' => 'UI/UX Designing'],
            ['industry_name' => 'Project Management'],
        ];
        foreach ($industries as $industry) {
            Industry::create($industry);
        }

    }
}
