<?php
namespace App\Services\Topic\Base;

/**
 *
 */
use Auth;
use App\Services\File\AccessUploadFile;

abstract class BaseAccessTopicService extends AccessUploadFile
{
    protected $object;
    protected $user;

    protected function user()
    {
      return Auth::user();
    }


}
