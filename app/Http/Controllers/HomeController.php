<?php

namespace App\Http\Controllers;

use App\Interfaces\HomeServiceInterface as Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    /**
     * Show the homepage
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->service->index();
    }

    /**
     * Show the hotel
     *
     * @return \Illuminate\Http\Response
     */

    public function hotel()
    {
        return $this->service->hotel();
    }

    /**
     * Show the tour
     *
     * @return \Illuminate\Http\Response
     */

    public function tour()
    {
        return $this->service->tour();
    }

    /**
     * Show the car
     *
     * @return \Illuminate\Http\Response
     */

    public function car()
    {
        return $this->service->car();
    }

    /**
     * Show the contact
     *
     * @return \Illuminate\Http\Response
     */

    public function contact()
    {

    }

    /**
     * Show the contact
     *
     * @return \Illuminate\Http\Response
     */

    public function service()
    {

    }

    public function comment(Request $request,$type = '',$id_post = '')
    {
        return $this->service->comment($request,$type,$id_post);
    }
    /*
    * Method to get more than comment of post
    */
    public function getMoreComment(Request $request,$type = '',$id_post = '')
    {
        return $this->service->getMoreComment($request,$type,$id_post);
    }




}
