<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Model\Tour;
use App\Model\Car;
use App\Model\Hotel;
use App\Model\ListBook;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Hotel $hotel,Tour $tour,Car $car)
    {
      $this->hotel = $hotel;
      $this->tour = $tour;
      $this->car = $car ;
        // $this->middleware('auth');
    }

    /**
     * Show the homepage
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $hotel = $this->hotel->getPopularHotel(4);
      $tour   = $this->tour->getPopularTour(8);
      $car    = $this->car->getPopularCar(6);
      return view('page.home')
                  ->with([
                    'hotel' => $hotel,
                    'tour'  => $tour,
                    'car'   => $car,
                  ]);
    }

    /**
     * Show the hotel
     *
     * @return \Illuminate\Http\Response
     */

    public function hotel()
    {

      return view('page.hotel');
    }

    /**
     * Show the tour
     *
     * @return \Illuminate\Http\Response
     */

    public function tour()
    {
      $list = $this->tour->getAll(6);
      return view('page.tour')->with([
        'list' => $list
      ]);
    }

    /**
     * Show the car
     *
     * @return \Illuminate\Http\Response
     */

    public function car()
    {
      $list = $this->car->hasCar();
      return view('page.car')->with([
        'list' => $list
      ]);
      
    }

    /**
     * Show the blog
     *
     * @return \Illuminate\Http\Response
     */

    public function blog()
    {
      return view('page.blog');
    }

    /**
     * Show the contact
     *
     * @return \Illuminate\Http\Response
     */

    public function contact()
    {
      return view('page.blog');
    }

    /**
     * Show the contact
     *
     * @return \Illuminate\Http\Response
     */

    public function service()
    {
      return view('page.service');
    }



}
