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
            'username' => '向井 隆',
            'password' => Hash::make('ecc'),    //パスワードはハッシュ値しないといけない
            'email' => 'mukai@ecccomp.com',
            'store_id' => 1,
            'position_id' => 1,
            'tell' => "080-2645-7978",
        ]);
        DB::table('users')->insert([
            'username' => '西村 隆平',
            'password' => Hash::make('ecc'),    //パスワードはハッシュ値しないといけない
            'email' => 'nishimura@ecccomp.com',
            'store_id' => 1,
            'position_id' => 2,
            'tell' => "090-1104-5182",
        ]);
        DB::table('users')->insert([
            'username' => '佐古 ',
            'password' => Hash::make('ecc'),    //パスワードはハッシュ値しないといけない
            'email' => 'sako@ecccomp.com',
            'store_id' => 1,
            'position_id' => 4,
            'tell' => "080-6909-9222",
        ]);
    }
}
