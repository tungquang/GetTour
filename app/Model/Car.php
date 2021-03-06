<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Traits\ActionModel;

class Car extends Model
{
  use ActionModel;
  protected $fillable = ['id','name','content','status','id_type','unit_price','img','seat','unit','book','note','description'];
  protected $table = 'car';

  public function getType()
  {
    return $this->belongsTo('App\Model\TypeCar','id_type','id');
  }

  public function hasCar()
  {
    return $this->where('status' , 1)
                ->where('book',0 )
                ->get();
  }

  /* Method to get $limit popular car
  */
  public function getPopularCar($limit)
  {
    $popularlist = $this->getInBookTable()
                        ->orderBy('solong','desc')
                        ->where('type','car')
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

  public function comment()
  {
    $comment = $this->hasMany('App\Model\Comment','id_post','id')
                       ->where(['type'=>'tour'])
                       ->limit(2);
    return $comment;
  }

  /*
  * Method to search car
  */
  public function search($data)
  {


    //search base a tour
    $search = $this->where([
      'status'=> 1,
      'book'  => 0
    ]);

    //if type car is not null
    if($data->id_type)
    {
        $search = $search->where(['id_type' => $data->id_type]);
    }

    //if seat car is not null
    if($data->seat)
    {
        $search = $search->where('seat','>=', $data->seat);
    }


    //if price is not null then get all car has price <= $price
    if ($data->price) {
      $search = $search->where('unit_price','>=',$data->price);
    }


  return $search->get();
  }
}
