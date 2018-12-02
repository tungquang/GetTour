<?php

use Illuminate\Database\Seeder;
use App\Model\TypeCar;

class TypeCarTableSeeder extends Seeder
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
        $type = new TypeCar();
        $type->name = 'Xe loai'.$i;
        $type->save();
      }
    }
}
