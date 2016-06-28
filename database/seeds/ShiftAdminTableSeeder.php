<?php

use Illuminate\Database\Seeder;

class ShiftAdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shift_admin')->truncate();

        DB::table('shift_admin')->insert([
            'password' => Hash::make('ecc'),    //パスワードはハッシュ値しないといけない
            'email' => 'ecc@gmail.com',
        ]);
    }
}
