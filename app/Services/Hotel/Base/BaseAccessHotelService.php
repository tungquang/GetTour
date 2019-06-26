<?php
namespace App\Services\Hotel\Base;

/**
 *
 */
use Auth;
use App\Model\Star;
use App\Model\Cites;
use App\Model\Nations;
use App\Services\Upload\UploadFile;


abstract class BaseAccessHotelService extends UploadFile
{
  protected $object;

  protected function star()
  {
    return new Star;
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
  protected function checkExits($id)
  {
    $hotel = $this->hotel->getbyIdOrfind($id);
    if(!$hotel)
    {
      throw new \Exception("Hotel not found", 1);
    }
    $this->object = $hotel;
  }

}
