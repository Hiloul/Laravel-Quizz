<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Question;
use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\Option;
use \App\Models\Answer;
use Database\Factories\RoleFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();
        // Answer::factory(10)->create();
        Category::factory(10)->create();
        Question::factory(10)->create();
        Option::factory(10)->create();
        
    }
}
