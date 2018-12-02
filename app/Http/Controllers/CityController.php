<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Cites;
use Response;

class CityController extends Controller
{

    public function index($nation)
    {
      $list = Cites::getByNation($nation);
      $view = view('admin.tour.city-list-render')
                  ->with(['list'=>$list])
                  ->render();
      return response()->json($view);
    }
}
