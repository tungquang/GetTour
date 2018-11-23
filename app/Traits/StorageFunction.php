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

		return Storage::disk($disk)
        				->put(
                  $this->getInf($file)['name'],
                  file_get_contents($file)
                );
	}
}
