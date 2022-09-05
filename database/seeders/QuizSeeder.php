<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuizSeeder extends Seeder
{

    public function run()
    {
        \App\Models\Quiz::factory(10)->create();
    }
}