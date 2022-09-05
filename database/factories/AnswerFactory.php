<?php

namespace Database\Factories;

use App\Models\Answer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Answer>
 */
class AnswerFactory extends Factory
{
    protected $model = answer::class;

    public function definition()
    {
        return [
            'user_id' => rand(1, 10),
            'question_id' => rand(1, 50),
            'answer'=>'answer'.rand(1, 4),
        ];
    }
}
