<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TypeTour extends Model
{
    protected $fillable = ['name','note'];
    protected $table ='type_tour';
}
