<?php

use Illuminate\Database\Seeder;
use App\Model\TypeTour;

class TypeTourSeeder extends Seeder
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
        $type = new TypeTour();
        $type->name = 'Tour'.$i;
        $type->save();
      }
    }
}
