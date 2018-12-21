<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAdminColumnToComments1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comments1', function (Blueprint $table) {
          $table->renameColumn('id_customer','id_user');
          $table->boolean('admin');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comments1', function (Blueprint $table) {
          $table->renameColumn('id_customer','id_user');
          $table->boolean('admin');
        });
    }
}
