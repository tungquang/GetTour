<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CustomerDetail extends Model
{
    protected $table = 'customer_detail';
    protected $fillable = ['id','name','sex','phone','address'];
}
