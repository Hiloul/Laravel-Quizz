<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Answer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use PharIo\Manifest\Email;

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
        
            'answer1' => fake()->word(),
            'answer2' => fake()->word(),
            'answer3' => fake()->city(),
            'answer4' => rand(1,5),
            'answer5' => fake()->text(200),
            'email' => rand(1,1),
            'user_id'=> rand(1,1),
        ];
    }
}
