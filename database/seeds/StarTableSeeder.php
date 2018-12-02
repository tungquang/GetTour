<?php

use Illuminate\Database\Seeder;
use App\Model\Star;

class StarTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $star1 = new Star();
        $star1->name = 'Khách sạn 1 Sao';
        $star1->save();

        $star2 = new Star();
        $star2->name = 'Khách sạn 2 Sao';
        $star2->save();

        $star3 = new Star();
        $star3->name = 'Khách sạn 3 Sao';
        $star3->save();

        $star4 = new Star();
        $star4->name = 'Khách sạn 4 Sao';
        $star4->save();

        $star5 = new Star();
        $star5->name = 'Khách sạn 5 Sao';
        $star5->save();

        $star6 = new Star();
        $star6->name = 'Biệt thư 5 sao';
        $star6->save();
    }
}
