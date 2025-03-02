<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Programming',
            'slug' => slugMaker('Programming'),
            'description' => 'Programming is the process of creating a set of instructions that a computer can follow to perform specific tasks. It involves writing code in a programming language to build software applications, automate processes, and solve problems.'
        ]);
        Category::create([
            'name' => 'Javascript',
            'slug' => slugMaker('Javascript'),
            'description' => 'JavaScript (JS) is a high-level, interpreted programming language primarily used for creating interactive and dynamic web applications. It runs in web browsers and enables functionalities like animations, form validation, and asynchronous data fetching.'
        ]);
        Category::create([
            'name' => 'Engineering',
            'slug' => slugMaker('Engineering'),
            'description' => 'Engineering is the practice of using natural science, mathematics, and the engineering design process to solve problems within technology, increase efficiency and productivity, and improve systems..'
        ]);
        Category::create([
            'name' => 'Vue.js',
            'slug' => slugMaker('Vue.js'),
            'description' => 'Vue (pronounced /vjuː/, like view) is a JavaScript framework for building user interfaces. It builds on top of standard HTML, CSS, and JavaScript and provides a declarative, component-based programming model that helps you efficiently develop user interfaces of any complexity.'
        ]);
    }
}
