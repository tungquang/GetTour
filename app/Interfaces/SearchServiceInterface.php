<?php
namespace App\Interfaces;

/**
 *
 */
interface SearchServiceInterface
{
  public function searchTour($request);

  public function searchHotel($request);

  public function searchCar($request);

}
