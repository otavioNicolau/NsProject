<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */


    public function run(): void
    {


        User::factory()->create([
            'name' => 'USUARIO 01',
            'email' => 'user@teste.com.br',
            'password' => bcrypt('123456'),

        ]);

        $this->call([
            ProjectSeeder::class,
            TaskSeeder::class,
        ]);
    }
}
