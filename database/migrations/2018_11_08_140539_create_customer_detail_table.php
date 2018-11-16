<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->string('age');
            $table->boolean('sex')->nullable($value=true);
            $table->string('address');
            $table->string('phone');
            $table->string('passport');
            $table->string('id_country');
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
        Schema::dropIfExists('customer');
    }
}
