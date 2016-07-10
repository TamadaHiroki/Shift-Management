<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHopeNumberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hope_number', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('week_day');
            $table->time('hope_time');
            $table->integer('hope_number');
            $table->integer('position_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('hope_number');
    }
}
