<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Traits\ActionModel;

class CustomerDetail extends Model
{
    use ActionModel;

    protected $table = 'customer_detail';
    protected $fillable = ['id','age','sex','phone','address','passport','id_country','img'];

    /*@retunr App/Htpp/Controlers
    */

}
