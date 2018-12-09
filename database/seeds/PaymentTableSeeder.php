<?php

use Illuminate\Database\Seeder;
use App\Model\PayMent;

class PaymentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $payment = new PayMent();
        for($i =1;$i<5;$i++)
        {
          $payment->create([
            'name'=>'Loai'.$i
          ]);
        }
    }
}
