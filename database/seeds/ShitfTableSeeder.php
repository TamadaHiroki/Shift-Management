<?php

use Illuminate\Database\Seeder;

class ShitfTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shift')->truncate();

        DB::table('shift')->insert([
            'user_id' => 1,
            'start' => "2016-07-26 07:00:00",
            'end' => "2016-07-26 22:00:00"
        ]);

        DB::table('shift')->insert([
            'user_id' => 1,
            'start' => "2016-07-27 07:30:00",
            'end' => "2016-07-27 22:00:00"
        ]);

        DB::table('shift')->insert([
            'user_id' => 2,
            'start' => "2016-07-26 07:00:00",
            'end' => "2016-07-26 22:00:00"
        ]);

        DB::table('shift')->insert([
            'user_id' => 2,
            'start' => "2016-07-27 07:00:00",
            'end' => "2016-07-27 22:00:00"
        ]);

        DB::table('shift')->insert([
            'user_id' => 3,
            'start' => "2016-07-27 07:00:00",
            'end' => "2016-07-27 22:00:00"
        ]);

        DB::table('shift')->insert([
            'user_id' => 4,
            'start' => "2016-07-27 07:00:00",
            'end' => "2016-07-27 22:00:00"
        ]);
    }
}
