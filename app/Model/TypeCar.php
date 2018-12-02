<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TypeCar extends Model
{
  protected $fillable = ['id','name','note'];
  protected $table = 'type_car';
}
