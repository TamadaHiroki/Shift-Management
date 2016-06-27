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
            'employee_id' => 1000,
            'store_id' => 10,
            'position_id' => 1,
            'tell' => "0120-000-1234",
        ]);
        DB::table('users')->insert([
            'username' => 'test2',
            'password' => Hash::make('ecc2'),    //パスワードはハッシュ値しないといけない
            'email' => 'ecc@gmail.com',
            'employee_id' => 1001,
            'store_id' => 10,
            'position_id' => 1,
            'tell' => "0120-000-5678",
        ]);
    }
}
