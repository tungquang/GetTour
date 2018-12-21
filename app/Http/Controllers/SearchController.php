<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\SearchServiceInterface;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function __construct(SearchServiceInterface $response)
    {
      $this->response = $response;
    }

    public function searchTour(Request $request)
    {
      return $this->response->searchTour($request);
    }

    public function searchHotel(Request $request)
    {
      return $this->response->searchHotel($request);
    }

    public function searchCar(Request $request)
    {
      return $this->response->searchCar($request);
    }

}
