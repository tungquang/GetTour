<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
    protected $table = 'permissions';
    protected $fillable = ['name','description','display_name'];
    protected $attributes = [];

    private function setAttributes(array $attributes = [])
    {
       $this->attributes = [
        'name'         => $attributes['name'],
        'display_name' => $attributes['display_name'],
        'description'  => $attributes['description']
      ];
    }

    public function update(array $attributes = [], array $options = [])
    {

      $per = $this->where(['name' => $attributes['name']]);
      $this->setAttributes($attributes);
      if($per)
      {
        $per->update($this->attributes);
        return $per;
      }
      return false;


    }
    

}
