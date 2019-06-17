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

    public function putFile($disk = 'local', $file)
    {
        try {
            if( $this->hasImage($file) ) {
                $nameFile = $this->randName($file);
                /*If file has exits then add new name*/
                if ( Storage::disk($disk)->exists($nameFile) ) {
                    $nameFile = rand().$nameFile;
                }
                Storage::disk($disk)->put( $nameFile, file_get_contents($file) );
                return $nameFile;
            }
            throw new \Exception("File is not image", 1);
        } catch (\Exception $e) {
            return '';
        }
    }

    public function putMultiFile($disk = 'local', $files)
    {

        if ( !$this->hasImage($files) ) {
            throw new \Exception("Array has file which is not image", 1);
        }

        $arrName = [];
        foreach ($files as $file) {
            array_push( $arrName, $this->putFile($disk, $file) );
        }
        return $arrName;
    }

    public function hasImage($files)
    {
        $errorFile = true;
        if (!is_array($files)) {
            $files = [$files];
        }
        foreach ($files as $file) {
            if(!$this->image($file)) {
                $errorFile = false;
            }
        }
        return $errorFile;
    }

    public function image($file)
    {
        $type = ['png','jpg','jpeg','gif'];
        $typeFile = $file->getClientOriginalExtension();
        $flage = (in_array($typeFile,$type)) ? true : false;
        return $flage;
    }

    public function deleteFile($names)
    {
        if (!is_array($names)) {
            $names = [$names];
        }
        foreach ($names as $name) {
            Storage::delete('/public/'.$name);
        }
        return true;
    }

    public function randName($file)
    {
        $typeFile = $file->getClientOriginalExtension();
        return $newName = time().rand().'.'.$typeFile;
    }



}
