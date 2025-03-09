<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Course::create([
            'title' => 'Mechanical Engineering Fundamentals',
            'description' => 'test',
            'category_id' => Category::where('name', 'Engineering')->value('id'),
            'instructor_id' => 1,
            'price' => 1.00,
            'level' => 'beginner',
        ]);

        Course::create([
            'title' => 'Full-Stack Web Development',
            'description' => 'test',
            'category_id' => Category::where('name', 'Engineering')->value('id'),
            'instructor_id' => 1,
            'price' => 1.00,
            'level' => 'beginner',
        ]);
    }
}

