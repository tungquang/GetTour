<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Traits\ActionModel;

class Bill extends Model
{
  use ActionModel;
  protected $fillable = ['id','id_customer','unit','pay','id_car','total'];
  protected $table = 'bill';

  public static function getNewBill()
  {
    return self::where(['check'=> 0])->get();
  }

  public function customer()
  {
    return $this->belongsTo('App\Model\Customer','id_customer','id');
  }

  public function listbook()
  {
    return $this->hasMany('App\Model\ListBook','id_bill','id');
  }

  public static function getCheckedBill()
  {
    return self::where(['check' => 1])->get();
  }

  public function getPayment()
  {
    return $this->hasOne('App\Model\PayMent','id','pay');
  }

  public function check($id_bill)
  {
    return $this->where(['id'=> $id_bill])->update(['check' => 1]);
  }

}
