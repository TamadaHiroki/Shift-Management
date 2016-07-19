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
        ]);
        DB::table('position')->insert([
            'position' => '惣菜',
        ]);
        DB::table('position')->insert([
            'position' => '鮮魚',
        ]);
        DB::table('position')->insert([
            'position' => '商品補充',
        ]);
    }
}
