<?php

namespace Database\Seeders;

use App\Models\Profession;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProfessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $professions = [
            ['profession_name' => 'Software Engineer'],
            ['profession_name' => 'Mobile Developer'],
            ['profession_name' => 'iOS Developer'],
            ['profession_name' => 'Android Developer'],
            ['profession_name' => 'Frontend Engineer'],
            ['profession_name' => 'Backend Engineer'],
            ['profession_name' => 'Full-Stack Engineer'],
            ['profession_name' => 'Software Achitect'],
            ['profession_name' => 'Embedded Engineer'],
            ['profession_name' => 'Data Engineer'],
            ['profession_name' => 'Security Engineer'],
            ['profession_name' => 'Machine Learning Engineer'],
            ['profession_name' => 'Engineering Manager'],
            ['profession_name' => 'QA Engineer'],
            ['profession_name' => 'DevOps'],
            ['profession_name' => 'Data Scientist'],
            ['profession_name' => 'User Researcher'],
            ['profession_name' => 'Visual Designer'],
            ['profession_name' => 'Creative Director'],
            ['profession_name' => 'Graphic Designer'],
            ['profession_name' => 'Product Designer'],
            ['profession_name' => 'Design Manager'],
            ['profession_name' => 'Product Manager'],
            ['profession_name' => 'Operations'],
            ['profession_name' => 'Finance/Accounting'],
            ['profession_name' => 'Human Resource'],
            ['profession_name' => 'Office Manager'],
            ['profession_name' => 'Recruiter'],
            ['profession_name' => 'Customer Service'],
            ['profession_name' => 'Operations Manager'],
            ['profession_name' => 'Chief of Staff'],
            ['profession_name' => 'Sales'],
            ['profession_name' => 'Business Developer'],
            ['profession_name' => 'Sales Development Representative'],
            ['profession_name' => 'Account Executive'],
            ['profession_name' => 'Business Development Manager'],
            ['profession_name' => 'Account Manager'],
            ['profession_name' => 'Sales Manager'],
            ['profession_name' => 'Customer Success Manager'],
            ['profession_name' => 'Marketing'],
            ['profession_name' => 'Growth Hacker'],
            ['profession_name' => 'Marketing Manager'],
            ['profession_name' => 'Digital Marketing Manager'],
            ['profession_name' => 'Content Creator'],
            ['profession_name' => 'Product Marketing Manager'],
            ['profession_name' => 'Social Media Manager'],
            ['profession_name' => 'Copywriter'],
            ['profession_name' => 'Management'],
            ['profession_name' => 'CEO'],
            ['profession_name' => 'CFO'],
            ['profession_name' => 'CMO'],
            ['profession_name' => 'COO'],
            ['profession_name' => 'CTO'],
            ['profession_name' => 'Other Engineering'],
            ['profession_name' => 'Hardware Engineer'],
            ['profession_name' => 'Mechanical Engineer'],
            ['profession_name' => 'Systems Engineer'],
            ['profession_name' => 'Other'],
            ['profession_name' => 'Business Analyst'],
            ['profession_name' => 'Project Manager'],
            ['profession_name' => 'Attorney'],
            ['profession_name' => 'Data Analyst'],
        ];

        foreach ($professions as $profession) {
            Profession::create($profession);
        }

    }
}
