<?php

use Illuminate\Database\Seeder;

class StoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stores')->truncate();

        DB::table('stores')->insert([
            'store_name' => '1号店',
            'shiftAdmin_id' => 'ecc@gmail.com',
            'shiftAdmin_id' => 1,
            
        ]);
    }
}
