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
    return belongsTo('App\Model\TyperCar','id_type','id');
  }

  public function hasCar()
  {
    return $this->where('status' , 1)
                ->where('book',0 )
                ->get();
  }
}
