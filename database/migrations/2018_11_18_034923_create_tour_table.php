<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTourTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_province');
            $table->integer('id_type');
            $table->string('name');
            $table->string('time_in');
            $table->string('time_out');
            $table->string('place');
            $table->integer('day');
            $table->integer('seat');
            $table->float('unit_price');
            $table->float('promotion_time');
            $table->string('content');
            $table->string('img');
            $table->integer('number_seated');
            $table->string('note');
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
        Schema::dropIfExists('tour');
    }
}
