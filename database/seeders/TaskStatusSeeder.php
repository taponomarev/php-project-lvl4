<?php

namespace Database\Seeders;

use http\Client\Curl\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
