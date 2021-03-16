<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TaskStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = ['новый', 'в работе', 'на тестировании', 'завершен'];
        $user = \App\Models\User::factory()->create();

        foreach ($statuses as $status) {
            $data = [
                'name' => $status,
                'created_at' => now()
            ];
            $user->taskStatuses()->create($data);
        }
    }
}
