<?php

namespace Database\Factories;

use App\Models\Result;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Result>
 */
class ResultFactory extends Factory
{
    protected $model = Result::class;
    public function definition()
    {
        return [
                
                'user_id' => rand(1, 10),
                'quiz_id' => rand(1, 10),
                'point'=>rand(1, 100),
                'correct'=>rand(1, 10),
                'wrong'=>rand(1, 20),
        ];
    }
}
