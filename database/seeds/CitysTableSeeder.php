<?php

use Illuminate\Database\Seeder;
use App\Model\Cites;

class CitysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $s = 1;
      for($i=1;$i<20;$i++)
      {
        if($s>10)
        {
          $s=1;
        }
        $type = new Cites();
        $type->id_nation = $s;
        $type->name = 'Thanh Pho'.$i;
        $type->save();
        $s++;
      }
    }
}
