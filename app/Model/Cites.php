<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Cites extends Model
{
    protected $fillable = ['name','id_nation','note'];
    protected $table = 'citys';

    public static function getByNation($nation)
    {
      return self::where(['id_nation'=>$nation])->get();
    }
}
