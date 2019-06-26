<?php
namespace App\Services\Car\Base;

/**
 *
 */
use App\Services\Upload\UploadFile;

abstract class BaseAccessCarService extends UploadFile
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
