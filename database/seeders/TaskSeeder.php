<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->insert([
            'id' => 1,
            'name' => 'Тестовая задача',
            'description' => 'Описание',
            'status_id' => 1,
            'created_by_id' => 1,
            'assigned_to_id' => null,
            'created_at' => now()
        ]);
    }
}
