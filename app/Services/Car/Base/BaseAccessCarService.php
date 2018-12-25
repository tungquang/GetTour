<?php
namespace App\Services\Car\Base;

/**
 *
 */
use App\Services\File\AccessUploadFile;

abstract class BaseAccessCarService extends AccessUploadFile
{
  protected $object;

  protected function checkExit($id)
  {
     $this->object = $this->car->getbyIdOrfind($id);

      if(!$this->object)
      {
        throw new \Exception("Not found", 1);
      }
     return $this->object;
  }
}
