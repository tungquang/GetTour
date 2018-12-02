<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Nations extends Model
{
    protected $table = 'nations';
    protected $fillable = ['name','note'];
}
