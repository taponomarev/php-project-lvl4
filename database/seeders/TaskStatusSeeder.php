<?php

namespace Database\Seeders;

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
        DB::table('task_statuses')->insert([
            'id' => 1,
            'name' => 'новый',
            'created_at' => now()
        ]);

        DB::table('task_statuses')->insert([
            'id' => 2,
            'name' => 'в работе',
            'created_at' => now()
        ]);

        DB::table('task_statuses')->insert([
            'id' => 3,
            'name' => 'на тестировании',
            'created_at' => now()
        ]);

        DB::table('task_statuses')->insert([
            'id' => 4,
            'name' => 'завершен',
            'created_at' => now()
        ]);
    }
}
