<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    public function definition(): array
    {

        $faker = \Faker\Factory::create('pt_BR'); 
        
        return [
            'title' => $this->faker->sentence,
            'due_date' => $this->faker->dateTimeBetween('now', '+1 month'), 
            'project_id' => null, 
        ];
    }
}