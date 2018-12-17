<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Traits\ActionModel;

class ListBook extends Model
{
  use ActionModel;
  protected $fillable = ['id','id_book','type','id_bill'];
  protected $table = 'listbook';
  protected $car,$tour,$hotel;

  public function book()
  {
    return $this->hasOne('App\Model\Book','id','id_book');
  }
  public function getByType($id_bill)
  {
    $listbook = $this->where(['id_bill' => $id_bill])->get();
    $array = [];
    foreach($listbook as $book)
    {
      $arr = [];
      switch ($book->type) {
        case 'tour':
            $object = $book->book->tour;
          break;
        case 'car':
            $object = $book->book->car;
          break;
        case 'hotel':
            $object = $book->book->hotel;
          break;
        default:
          $object= [];
          break;
        }
        //push attributet of object
        $arr = [
          'object' => $object,
          'book'   => $book->book,
          'type'   => $book->type
        ];
        //push all last
        array_push($array,$arr);
      }


    
    return $array;
  }


}
