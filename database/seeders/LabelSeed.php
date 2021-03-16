<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LabelSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('labels')->insert([
            'name' => 'Github',
            'description' => 'Описание',
            'creator_id' => 1,
            'created_at' => now()
        ]);

        DB::table('labels')->insert([
            'name' => 'Gitlab',
            'description' => 'Описание',
            'creator_id' => 1,
            'created_at' => now()
        ]);
    }
}
