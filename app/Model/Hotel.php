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
            'description'
  ];
  protected $operators = 'IN';

  public function getStar()
  {
    return $this->belongsTo('App\Model\Star','star','id');
  }
  public function getProvince()
  {
    return $this->belongsTo('App\Model\Cites','id_province','id');
  }

  /*
  * Method to get hotel has room
  * if id = null then return all hotal has room
  * Elss return the hotel has id was $id
  */
  public function hasRoom($id='')
  {
    if($id)
    {
      return $this->where([
                    'status'=>1,
                    'id' => $id
                  ])
                  ->whereRaw('book < room')
                  ->get();
    }
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

  /*
  * Method to search hotel
  */
  public function search($data)
  {

    //search base a tour
    $search = $this->where(['status'=> 1]);
    //if province is not null
    if($data->province)
    {
        $search = $search->where(['id_province'=>$data->province]);
    }

    //if price_first is not null then get all tour has price_first >= unit_price
    if ($data->price_first) {
      $search = $search->where('unit_price','>=',$data->price_first);
    }
    //if price_last is not null then get all tour has price_last <= unit_price
    if ($data->price_last) {
      $search = $search->where('unit_price','<=',$data->price_last);
    }
    //if room is not null then get all tour has seat >= $room
    if ($data->room) {
      $search = $search->whereRaw('room - book >= ?',$data->room);
    }

    return $search->get();
  }

  /*
  * Method to get all comment
  */
  public function searchByStar($data)
  {
    return $this->whereIn('star',$data->star)->get();
  }
  public function comment()
  {
    $comment = $this->hasMany('App\Model\Comment','id_post','id')
                       ->where(['type'=>'hotel'])
                       ->limit(2);
    return $comment;
  }

}
