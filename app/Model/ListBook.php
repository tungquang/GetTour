<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Traits\ActionModel;

class ListBook extends Model
{
  use ActionModel;
  protected $fillable = ['id','id_book','type','id_bill'];
  protected $table = 'listbook';
}
