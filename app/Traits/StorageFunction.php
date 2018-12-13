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
  public function getInf($file)
	{
		return [
			'name' =>time().'-'.$file->getClientOriginalName(),
			'size' =>$file->getClientSize(),
			'type' =>$file->guessClientExtension(),
		];
	}
	public function putFile($disk,$file)
	{

    try {
      $nameFile = $this->getInf($file);
      $flage = Storage::disk($disk)
                             ->put(
                               $nameFile['name'],
                               file_get_contents($file)
                             );
      if(!$flage)
      {
        throw new \Exception("Error Processing Request", 1);
      }
      return $nameFile;


    } catch (\Exception $e) {
      return false;
    }


	}

  public function hasImage($file)
  {
    $type = ['png','jpg','jpeg'];

    $inforFile = $this->getInf($file);

    $flage = (in_array($inforFile['type'],$type)) ? $inforFile : false;

    return $flage;
  }
}
