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
            'start' => "2016/07/11 07:00:00",
            'end' => "2016/07/11 22:00:00"
        ]);

        DB::table('shift')->insert([
            'user_id' => 1,
            'start' => "2016/07/12 07:00:00",
            'end' => "2016/07/12 22:00:00"
        ]);

        DB::table('shift')->insert([
            'user_id' => 1,
            'start' => "2016/07/13 07:00:00",
            'end' => "2016/07/13 22:00:00"
        ]);

        DB::table('shift')->insert([
            'user_id' => 1,
            'start' => "2017/07/014 07:00:00",
            'end' => "2017/07/14 22:00:00"
        ]);

        DB::table('shift')->insert([
            'user_id' => 1,
            'start' => "2017/07/15 07:00:00",
            'end' => "2017/07/15 22:00:00"
        ]);

        DB::table('shift')->insert([
            'user_id' => 1,
            'start' => "2017/07/16 07:00:00",
            'end' => "2017/07/16 22:00:00"
        ]);

        DB::table('shift')->insert([
            'user_id' => 1,
            'start' => "2017/07/17 07:00:00",
            'end' => "2017/07/17 22:00:00"
        ]);

        DB::table('shift')->insert([
            'user_id' => 2,
            'start' => "2017/07/11 07:00:00",
            'end' => "2017/07/11 22:00:00"
        ]);

        DB::table('shift')->insert([
            'user_id' => 2,
            'start' => "2017/07/12 07:00:00",
            'end' => "2017/07/12 22:00:00"
        ]);

        DB::table('shift')->insert([
            'user_id' => 2,
            'start' => "2017/07/13 07:00:00",
            'end' => "2017/07/13 22:00:00"
        ]);

        DB::table('shift')->insert([
            'user_id' => 2,
            'start' => "2017/07/014 07:00:00",
            'end' => "2017/07/14 22:00:00"
        ]);

        DB::table('shift')->insert([
            'user_id' => 2,
            'start' => "2017/07/15 07:00:00",
            'end' => "2017/07/15 22:00:00"
        ]);

        DB::table('shift')->insert([
            'user_id' => 2,
            'start' => "2017/07/16 07:00:00",
            'end' => "2017/07/16 22:00:00"
        ]);

        DB::table('shift')->insert([
            'user_id' => 2,
            'start' => "2017/07/17 07:00:00",
            'end' => "2017/07/17 22:00:00"
        ]);
    }
}
