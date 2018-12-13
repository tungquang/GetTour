<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PayMent extends Model
{
  protected $fillable = ['id','name'];
  protected $table = 'payment';
}
