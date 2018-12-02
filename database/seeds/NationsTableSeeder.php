<?php

use Illuminate\Database\Seeder;
use App\Model\Nations;

class NationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      for($i=1;$i<10;$i++)
      {
        $type = new Nations();
        $type->name = 'Quoc gia'.$i;
        $type->save();
      }
    }
}
