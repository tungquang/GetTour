<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameColumnIdQuocgiaToIdNationInCitysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('citys', function (Blueprint $table) {
            $table->renameColumn('id_quocgia','id_nation');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('citys', function (Blueprint $table) {
            $table->renameColumn('id_quocgia','id_nation');
        });
    }
}
