<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{

    protected $fillable = ['id_province','id_type',
                  'name','time_in','time_out',
                  'place','day','seat','unit_price',
                  'content','img',
                  'number_seated'];
    protected $table = 'tour';

}
