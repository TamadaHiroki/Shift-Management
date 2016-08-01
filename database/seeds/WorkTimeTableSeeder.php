<?php

use Illuminate\Database\Seeder;

class WorkTimeTableSeeder extends Seeder
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
            'week_day' => '0',  //0：日曜日
            'start_time' => '09:30:00',
            'end_time' => '18:30:00',
        ]);
        DB::table('user_worktime')->insert([
            'user_id' => 2,
            'week_day' => '0',  //0：日曜日
            'start_time' => '09:30:00',
            'end_time' => '18:30:00',
        ]);
        DB::table('user_worktime')->insert([
            'user_id' => 3,
            'week_day' => '0',  //0：日曜日
            'start_time' => '10:30:00',
            'end_time' => '21:45:00',
        ]);

        for($i = 1; $i < 4; $i++){
            DB::table('user_worktime')->insert([
                'user_id' => $i,
                'week_day' => '1',  //１：月曜日
                'start_time' => '09:00:00',
                'end_time' => '18:00:00',
            ]);
            DB::table('user_worktime')->insert([
                'user_id' => $i,
                'week_day' => '2',  //２：火曜日
                'start_time' => '09:00:00',
                'end_time' => '12:00:00',
            ]);
            DB::table('user_worktime')->insert([
                'user_id' => $i,
                'week_day' => '3',  //３：水曜日
                'start_time' => '18:00:00',
                'end_time' => '22:00:00',
            ]);
            DB::table('user_worktime')->insert([
                'user_id' => $i,
                'week_day' => '4',  //４：木曜日
                'start_time' => '09:30:00',
                'end_time' => '18:00:00',
            ]);
            DB::table('user_worktime')->insert([
                'user_id' => $i,
                'week_day' => '5',  //５：金曜日
                'start_time' => '17:30:00',
                'end_time' => '21:00:00',
            ]);
            DB::table('user_worktime')->insert([
                'user_id' => $i,
                'week_day' => '6',  //６：土曜日
                'start_time' => '10:00:00',
                'end_time' => '18:00:00',
            ]);

        }

    }
}
