<?php

namespace Database\Seeders;

use DateTime;
use App\Models\Task;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 10; $i++) {
            Task::create([
                'title' => $faker->word,
                'description' => $faker->text,
                'is_completed' => false,
                'date_limit' => (new DateTime())->modify('+' . rand(1, 2) . ' days')->format('Y_m_d')
            ]);
        }
    }
}
