<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListBookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listbook', function (Blueprint $table) {
            $table->increments('id')->unsigned()->comment('id in book table');
            $table->integer('id_bill')->comment('id in bill table');
            $table->integer('id_book')->comment('id in book type table');
            $table->string('type');
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
        Schema::dropIfExists('listbook');
    }
}
