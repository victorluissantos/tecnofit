<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Movement;
use App\Models\PersonalRecord;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Criar usuários
        User::factory()->create(['name' => 'Joao']);
        User::factory()->create(['name' => 'Jose']);
        User::factory()->create(['name' => 'Paulo']);

        // Criar movimentos
        Movement::factory()->createMany([
            ['name' => 'Deadlift'],
            ['name' => 'Back Squat'],
            ['name' => 'Bench Press'],
        ]);

        // Criar personal records (sem alterações, isso está ok)
        PersonalRecord::factory()->createMany([
            ['user_id' => 1, 'movement_id' => 1, 'value' => 100.0, 'created_at' => '2021-01-01 00:00:00.0'],
            ['user_id' => 1, 'movement_id' => 1, 'value' => 180.0, 'created_at' => '2021-01-02 00:00:00.0'],
            ['user_id' => 1, 'movement_id' => 1, 'value' => 150.0, 'created_at' => '2021-01-03 00:00:00.0'],
            ['user_id' => 1, 'movement_id' => 1, 'value' => 110.0, 'created_at' => '2021-01-04 00:00:00.0'],
            ['user_id' => 2, 'movement_id' => 1, 'value' => 110.0, 'created_at' => '2021-01-04 00:00:00.0'],
            ['user_id' => 2, 'movement_id' => 1, 'value' => 140.0, 'created_at' => '2021-01-05 00:00:00.0'],
            ['user_id' => 2, 'movement_id' => 1, 'value' => 190.0, 'created_at' => '2021-01-06 00:00:00.0'],
            ['user_id' => 3, 'movement_id' => 1, 'value' => 170.0, 'created_at' => '2021-01-01 00:00:00.0'],
            ['user_id' => 3, 'movement_id' => 1, 'value' => 120.0, 'created_at' => '2021-01-02 00:00:00.0'],
            ['user_id' => 3, 'movement_id' => 1, 'value' => 130.0, 'created_at' => '2021-01-03 00:00:00.0'],
            ['user_id' => 1, 'movement_id' => 2, 'value' => 130.0, 'created_at' => '2021-01-03 00:00:00.0'],
            ['user_id' => 2, 'movement_id' => 2, 'value' => 130.0, 'created_at' => '2021-01-03 00:00:00.0'],
            ['user_id' => 3, 'movement_id' => 2, 'value' => 125.0, 'created_at' => '2021-01-03 00:00:00.0'],
            ['user_id' => 1, 'movement_id' => 2, 'value' => 110.0, 'created_at' => '2021-01-05 00:00:00.0'],
            ['user_id' => 1, 'movement_id' => 2, 'value' => 100.0, 'created_at' => '2021-01-01 00:00:00.0'],
            ['user_id' => 2, 'movement_id' => 2, 'value' => 120.0, 'created_at' => '2021-01-01 00:00:00.0'],
            ['user_id' => 3, 'movement_id' => 2, 'value' => 120.0, 'created_at' => '2021-01-01 00:00:00.0'],
        ]);
    }
}
