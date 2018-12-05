<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Traits\ActionModel;
use App\Model\TypeTour;

class Tour extends Model
{
    use ActionModel;
    protected $fillable = ['id','id_province','id_type',
                  'name','time_in','time_out',
                  'place','day','seat','unit_price',
                  'content','img','number_seated',
                  'id_car','id_hotel'
                ];
    protected $table = 'tour';

    public function getType()
    {
      return $this->belongsTo('App\Model\TypeTour','id_type','id');
    }
    public function getProvince()
    {
      return $this->belongsTo('App\Model\Cites','id_province','id');
    }

}
