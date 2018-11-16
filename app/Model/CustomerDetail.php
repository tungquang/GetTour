<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CustomerDetail extends Model
{
    protected $table = 'customer_detail';
    protected $fillable = ['id','age','sex','phone','address','passport','id_country'];

    /*@retunr App/Htpp/Controlers
    */
    public function updateOrCreateNew($data)
    {
      try {
        return self::create($data);

      } catch (\Exception $e) {
        return $this->where(['id'=>$data['id']])->update($data);
      }

    }
}
