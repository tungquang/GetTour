<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Traits\ActionModel;

class Hotel extends Model
{
    use ActionModel;
    protected $table = 'hotel';
    protected $fillable = [
            'id',
            'name','id_province','unit_price',
            'promotion_price','room',
            'book','content','status',
            'star','img','note',
  ];

  public function getStar()
  {
    return $this->belongsTo('App\Model\Star','star','id');
  }
  public function getProvince()
  {
    return $this->belongsTo('App\Model\Cites','id_province','id');
  }

  public function hasRoom()
  {
    return $this->where('status' , 1)
                ->whereRaw('book < room')
                ->get();
  }
  
  public function updateRoom($id , $book)
  {
    return $this->find($id)
                ->update('book' , $book);
  }
}
