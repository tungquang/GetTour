<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Traits\ActionModel;

class Car extends Model
{
  use ActionModel;
  protected $fillable = ['id','name','content','status','id_type','unit_price','img','soghe','unit','book','note'];
  protected $table = 'car';

  public function getType()
  {
    return $this->belongsTo('App\Model\TypeCar','id_type','id');
  }

  public function hasCar()
  {
    return $this->where('status' , 1)
                ->where('book',0 )
                ->get();
  }

  /* Method to get $limit popular car
  */
  public function getPopularCar($limit)
  {
    $popularlist = $this->getInBookTable()
                        ->orderBy('solong','desc')
                        ->where('type','car')
                        ->limit($limit)
                        ->get();
    if ($popularlist->count() < ($limit/2) ){
        $popularlist = $this->where(['status'=>1])
                             ->orderBy('id','desc')
                             ->limit($limit)
                             ->get();
    }
    else {

        foreach ($popularlist as $key => $value) {
          $this->object = $value->book;
          $popularlist[$key] = $this->convertToObject();
        }
    }
    return $popularlist;


  }
}
