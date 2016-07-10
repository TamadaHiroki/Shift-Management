<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    /**
     * データベース初期値設定の実行
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(ShiftAdminTableSeeder::class);
        $this->call(AdminTableSeeder::class);
        $this->call(PositionTableSeeder::class);
        $this->call(StoresTableSeeder::class);


    }
}
