<?php
namespace App\Services;


use Response;
use App\Model\Tour;
use App\Model\Hotel;
use App\Model\Car;
use App\Model\TypeCar;
use App\Model\Star;
use App\Model\Cites;
use App\Model\TypeTour;
use App\Interfaces\SearchServiceInterface;


 /**
  * @return App\Htpp\Controller\SearchController
  */
 class SearchService implements SearchServiceInterface
 {
   //
   public function __construct(Car $car,Hotel $hotel,Tour $tour)
   {
     $this->car = $car;
     $this->hotel = $hotel;
     $this->tour = $tour;

   }
   /*
   * Method to searh all tour has in request
   */
   public function searchTour($request)
   {

     $tour = $this->tour->search($request);
     $array = $request->all();
     $alert = 'Thông báo có '.$tour->count(). ' Tour được tìm thấy';
     return view('page.tour')
                ->with([
                  'list'     => $tour,
                  'alert'    => $alert,
                  'typetour' => TypeTour::all(),
                  'cites'    => Cites::all()
                ]);
   }

   /*
   * Method to searh all hotel has in request
   * Method has 2 way to search , by star or information
   */
   public function searchHotel($request)
   {
     //search by star
     if($request->star)
     {
       $hotel = $this->hotel->searchByStar($request);
     }
     else {
       $hotel = $this->hotel->search($request);
     }

     $alert = 'Thông báo có '.$hotel->count(). ' khách sạn được tìm thấy';
     return view('page.hotel')
                ->with([
                  'list' => $hotel,
                  'alert' => $alert,
                  'cites' => Cites::all(),
                  'star'  => Star::all()
                ]);
   }


   /*
   * Method to searh all car has in request
   */
   public function searchCar($request)
   {

     $car = $this->car->search($request);

     $alert = 'Thông báo có '.$car->count(). ' xe được tìm thấy';
     return view('page.car')
                ->with([
                  'list' => $car,
                  'alert' => $alert,
                  'typecar' => TypeCar::all(),
                ]);
   }
 }
