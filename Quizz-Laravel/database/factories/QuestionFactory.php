<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = Question::class;

    public function definition()
    {
        return [
            'category_id' => Category::all()->random()->id,
            'question_text' => fake()->sentence(),
        ];
    }
}
