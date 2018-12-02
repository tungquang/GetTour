<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Traits\ActionModel;

class Book extends Model
{
  use ActionModel;
  protected $fillable = ['id','book','unit','price'];
  protected $table = 'book';
}
