<?php
namespace App\Services\Upload;

/**
 *
 */
use App\Traits\StorageFunction;

class UploadFile
{
    use StorageFunction;
    private $disk = 'public';
    public $img = '';
    public $request;

    public function UploadFile($request)
    {
        if($request->hasFile('photo'))
        {
            $this->img = $this->putFile($this->disk,$request->photo);
        }
        else
        {
          throw new \Exception("Image not found", 1);
        }
    }




}
