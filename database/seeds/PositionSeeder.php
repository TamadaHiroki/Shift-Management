<?php

use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('position')->truncate();

        DB::table('position')->insert([
            'position' => '軍艦',
            'start_time' => '09:00:00',
            'end_time' => '20:00:00',
        ]);
    }
}
