<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        
        DB::table('users')->insert([
            'username' => 'test',
            'password' => Hash::make('ecc'),    //パスワードはハッシュ値しないといけない
            'email' => 'ecc@gmail.com',
        ]);
//        DB::table('users')->insert([
//            'username' => 'test2',
//            'password' => Hash::make('ECC'),    //パスワードはハッシュ値しないといけない
//            'email' => 'ecc@gmail.com',
//        ]);
    }
}
