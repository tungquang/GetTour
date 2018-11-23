<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeNullablePromotionPriceAndNoteInTourTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tour', function (Blueprint $table) {
            $table->float('promotion_price')->nullable($value=true)->change();
            $table->string('note')->nullable($value=true)->change();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tour', function (Blueprint $table) {
          $table->float('promotion_price')->nullable($value=true)->change();
          $table->string('note')->nullable($value=true)->change();
        });
    }
}
