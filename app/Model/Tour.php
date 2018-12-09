<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Traits\ActionModel;
use App\Model\TypeTour;

/*
*@return App/Service/TourService
*/
class Tour extends Model
{
    use ActionModel;
    protected $fillable = ['id','id_province','id_type',
                  'name','time_in','time_out',
                  'place','day','seat','unit_price',
                  'content','img','book',
                  'type_car','type_hotel'
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


}
