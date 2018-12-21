<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Traits\ActionModel;

class Book extends Model
{
  use ActionModel;
  protected $fillable = ['id','book','unit','price'];
  protected $table = 'book';

  public function tour()
  {
    return $this->belongsTo('App\Model\Tour','book','id');
  }

  public function hotel()
  {
    return $this->belongsTo('App\Model\Hotel','book','id');
  }

  public function car()
  {
    return $this->belongsTo('App\Model\Car','book','id');
  }
  
}
