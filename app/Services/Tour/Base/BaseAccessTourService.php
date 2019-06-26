<?php
namespace App\Services\Tour\Base;

/**
 *
 */

use Auth;
use App\Model\TypeTour;
use App\Model\Nations;
use App\Model\Cites;
use App\Services\Upload\UploadFile;

abstract class BaseAccessTourService extends UploadFile
{
  protected $object;

  protected function type()
  {
    return new TypeTour;
  }
  protected function cites()
  {
    return new Cites;
  }
  protected function nations()
  {
    return new Nations;
  }
  protected function user()
  {
    return Auth::user();
  }
  protected function checkExit($id)
  {
    $tour = $this->tour->getbyIdOrfind($id);
    if(!$tour)
    {
      throw new \Exception("Not found", 1);
    }
    $this->object = $tour;
  }
}
