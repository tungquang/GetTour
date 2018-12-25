<?php
namespace App\Traits;


use Storage;
/**
 *
 */
trait StorageFunction
{
  public $storage;

  public function __construct(Storage $storage)
  {
    $this->storage = $storage;
  }
  /*
  @return App/Services
  */
	public function putFile($disk,$file)
	{
      try {
            $nameFile = time().'-'.$file->getClientOriginalName();
            if($this->hasImage($file))
            {
               Storage::disk($disk)->put(
                    $nameFile,
                    file_get_contents($file)
                );
                return $nameFile;
            }
            throw new \Exception("Error Processing Request", 1);
        } catch (\Exception $e) {
          return '';
        }


	}
  public function hasImage($file)
  {
    $type = ['png','jpg','jpeg','gif'];
    $typeFile = $file->getClientOriginalExtension();
    $flage = (in_array($typeFile,$type)) ? true : false;
    return $flage;
  }
}
