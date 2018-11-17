<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Traits\ActionModel;

class UserDetail extends Model
{
  use ActionModel;

  protected $table = 'users_detail';
  protected $fillable = ['id','age','sex','phone','address','passport','id_country'];

}
