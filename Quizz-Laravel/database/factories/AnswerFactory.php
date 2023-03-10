<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Answer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Answer>
 */
class AnswerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = Answer::class;
     protected $model1 = User::class;

    public function definition()
    {
        return [
            'email' => rand(1,10),
            'user_id'=>rand(1,10),
            'answer1' => Str::random(10),
            'answer2' => Str::random(10),
            'answer3' => fake()->city(),
            'answer4' => rand(1,5),
            'answer5' => Str::random(50),
        ];
    }
}
