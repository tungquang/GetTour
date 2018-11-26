<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Traits\ActionModel;

class Car extends Model
{
  use ActionModel;
  protected $fillable = ['id','name','content','status','id_type','unit_price','img','soghe','unit','book','note'];
  protected $table = 'car';
}
