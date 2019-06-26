<?php
namespace App\Services\Topic\Base;

/**
 *
 */
use Auth;
use App\Services\Upload\UploadFile;

abstract class BaseAccessTopicService extends UploadFile
{
    protected $object;
    protected $user;

    protected function user()
    {
      return Auth::user();
    }


}
