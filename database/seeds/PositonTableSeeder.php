<?php

use Illuminate\Database\Seeder;

class PositonTableSeeder extends Seeder
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
            'start_time' => '07:00:00',
            'end_time' => '22:00:00'
        ]);

        DB::table('position')->insert([
            'position' => '刺身',
            'start_time' => '07:00:00',
            'end_time' => '22:00:00'
        ]);
    }
}
