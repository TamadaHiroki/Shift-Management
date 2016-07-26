<?php

use Illuminate\Database\Seeder;

class PositionTableSeeder extends Seeder
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
            'position' => 'レジ',
            'start_time' => '09:00:00',
            'end_time' => '22:00:00',
        ]);
        DB::table('position')->insert([
            'position' => '惣菜',
            'start_time' => '09:00:00',
            'end_time' => '22:00:00',
        ]);
        DB::table('position')->insert([
            'position' => '鮮魚',
            'start_time' => '09:00:00',
            'end_time' => '22:00:00',
        ]);
        DB::table('position')->insert([
            'position' => '商品補充',
            'start_time' => '09:00:00',
            'end_time' => '22:00:00',
        ]);
    }
}
