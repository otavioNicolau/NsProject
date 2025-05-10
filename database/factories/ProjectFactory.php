<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class ProjectFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->company,
            'user_id' => User::factory(), // Cria um usuário relacionado automaticamente
        ];
    }
}
