<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Model\Tour;
use App\Model\Car;
use App\Model\Hotel;

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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if (Auth::guard()->user()) {
        $user = Auth::guard()->user();
      }
      else {
        $user = Auth::guard('customer')->user();
      }
      $data['hotel'] = $this->hotel->getAll();
      $data['tour']   = $this->tour->getAll();
      $data['car']    = $this->car->getAll();
      return view('admin.tour')
                  ->with([
                    'user'=>$user,
                    'data'=>$data,
                  ]);
    }
    public function hotel()
    {

    }
}
