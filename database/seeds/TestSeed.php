<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert("INSERT INTO citys ( id_nation, name) VALUES ('1', 'Thành phố Hà Nội')");
    }
}
