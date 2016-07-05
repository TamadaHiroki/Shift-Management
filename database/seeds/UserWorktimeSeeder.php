<?php

use Illuminate\Database\Seeder;

class UserWorktimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_worktime')->truncate();

        DB::table('user_worktime')->insert([
            'user_id' => 1,
            'week_day' => 1,
            'start_time' => '09:00:00',
            'end_time' => '14:00:00',
        ]);
        DB::table('user_worktime')->insert([
            'user_id' => 2,
            'week_day' => 1,
            'start_time' => '11:00:00',
            'end_time' => '17:00:00',
        ]);
        DB::table('user_worktime')->insert([
            'user_id' => 3,
            'week_day' => 1,
            'start_time' => '16:00:00',
            'end_time' => '20:00:00',
        ]);
    }
}
