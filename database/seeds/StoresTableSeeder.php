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
            'store' => '1号店',
            'shift_admin_id' => 1,
            
        ]);
    }
}
