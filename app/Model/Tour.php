<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Traits\ActionModel;
use App\Model\TypeTour;
use App\Model\ListBook;
use Illuminate\Support\Facades\DB;

/*
*@return App/Service/TourService
*/
class Tour extends Model
{
    use ActionModel;
    protected $fillable = ['id_province','id_type','name','time_in','time_out',
                  'place','day','seat','unit_price','content','img','book',
                  'type_car','type_hotel','description'
                ];
    protected $table = 'tour';
    /*Method to get type tour with TyperTour relatioship
    */
    public function getType()
    {
      return $this->belongsTo('App\Model\TypeTour','id_type','id');
    }

    public function getProvince()
    {
      return $this->belongsTo('App\Model\Cites','id_province','id');
    }

    public function getTypeHotel()
    {
      return $this->belongsTo('App\Model\Star','type_hotel','id');
    }

    public function getTypeCar()
    {
      return $this->belongsTo('App\Model\TyperCar','type_car','id');
    }

    public function hasTour()
    {
      return $this->where('status' , 1)
                  ->whereRaw('book < seat')
                  ->get();
    }

    /* Method to get $limit popular tour
    */
    public function getPopularTour($limit)
    {
      $popularlist = $this->getInBookTable()
                          ->orderBy('solong','desc')
                          ->where('type','tour')
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
    * Method to get all comment
    */

    public function comment()
    {
      $comment = $this->hasMany('App\Model\Comment','id_post','id')
                         ->where(['type'=>'tour'])
                         ->limit(2);
      return $comment;
    }
    /*
    * Method to search tour
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
      //if type tour is not null

      if($data->type_tour)
      {
          $search = $search->where(['id_type' => $data->type_tour]);
      }

      //if day is not null then get all tour has day >= $day
      if ($data->day) {
        $search = $search->where('day','>=',$data->day);
      }
      //if seat is not null then get all tour has seat >= $seat
      if ($data->seat) {
        $search = $search->where('seat','>=',$data->seat);
      }

    return $search->get();
    }


}
