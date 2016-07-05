<?php

use Illuminate\Database\Seeder;

class HopeNumberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hope_number')->truncate();

        DB::table('hope_number')->insert([
            'week_day' => 1,
            'hope_time' => '09:00:00',
            'hope_time' => '09:00:00',
            'hope_number' => 1,
            'position_id' => 1,
        ]);
        DB::table('hope_number')->insert([
            'week_day' => 1,
            'hope_time' => '14:00:00',
            'hope_number' => 1,
            'position_id' => 1,
        ]);
        DB::table('hope_number')->insert([
            'week_day' => 1,
            'hope_time' => '17:00:00',
            'hope_number' => 1,
            'position_id' => 1,
        ]);
    }
}
