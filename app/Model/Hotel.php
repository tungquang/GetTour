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
  /* Method to get $limit popular hotel
  */
  public function getPopularHotel($limit)
  {
    $popularlist = $this->getInBookTable()
                        ->orderBy('solong','desc')
                        ->where('type','hotel')
                        ->limit($limit)
                        ->get();

    if ($popularlist->count() < ($limit/2) ){
        $popularlist = $this->where(['status'=>1])
                             ->orderBy('id','desc')
                             ->limit($limit)
                             ->get();
    }
    else {
  
        foreach ($popularlist as $key => $value) {
          $this->object = $value->book;
          $popularlist[$key] = $this->convertToObject();
        }
    }
    return $popularlist;

  }
}
