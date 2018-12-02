<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Traits\ActionModel;

class Bill extends Model
{
  use ActionModel;
  protected $fillable = ['id','id_customer','unit','pay','id_car','total'];
  protected $table = 'bill';
}
