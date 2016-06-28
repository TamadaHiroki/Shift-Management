<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin')->truncate();

        DB::table('admin')->insert([
            'username' => 'admin',
            'password' => Hash::make('ecc'),    //パスワードはハッシュ値しないといけない
            'email' => 'ecc@gmail.com',
        ]);
    }
}
