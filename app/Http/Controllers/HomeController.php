<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Model\Cites;
use App\Model\TypeCar;
use App\Model\TypeTour;
use App\Model\Star;
use App\Model\Tour;
use App\Model\Car;
use App\Model\Hotel;
use App\Model\ListBook;
use App\Interfaces\CommentServiceInterface;
use Response;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Hotel $hotel,Tour $tour,Car $car,CommentServiceInterface $comment)
    {
      $this->hotel = $hotel;
      $this->tour = $tour;
      $this->car = $car ;
      $this->comment = $comment;

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
                    'cites' => Cites::all(),
                    'typecar'  => TypeCar::all(),
                    'typetour' => TypeTour::all()

                  ]);
    }

    /**
     * Show the hotel
     *
     * @return \Illuminate\Http\Response
     */

    public function hotel()
    {
      $list = $this->hotel->hasRoom();
      return view('page.hotel')->with([
        'list'     => $list,
        'star'     => Star::all(),
        'cites'    => Cites::all()
      ]);
    }

    /**
     * Show the tour
     *
     * @return \Illuminate\Http\Response
     */

    public function tour()
    {
      $list = $this->tour->hasTour();
      return view('page.tour')
            ->with([
                'list'     => $list,
                'typetour' => TypeTour::all(),
                'cites'    => Cites::all()
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
        'list' => $list,
        'typecar' => TypeCar::all(),
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

    public function comment(Request $request,$type = '',$id_post = '')
    {
      if($request->content)
      {

        if($this->hasSign())
        {

          return $this->comment->store($request,$type,$id_post);
        }

        return Response::json(['errors' => 'sign']);
      }

      return response()->json($value = false);


    }
    /*
    * Method to get more than comment of post
    */
    public function getMoreComment(Request $request,$type = '',$id_post = '')
    {
      if($request->id_last)
      {
          return $this->comment->getMoreComment($request,$type,$id_post);
      }
      return response()->json($value = false);

    }

    private function hasSign()
    {
      if(Auth::user() || Auth::guard('customer')->user())
      {
        return true;
      }
      return false;

    }



}
