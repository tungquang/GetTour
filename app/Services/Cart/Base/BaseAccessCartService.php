<?php
namespace App\Services\Cart\Base\;

use Cart;
use Auth;
use App\Model\Tour;
use App\Model\Car;
use App\Model\Hotel;
use App\Model\Bill;
use App\Model\Book;
use App\Model\ListBook;
/**
 *
 */
abstract class BaseAccessCartService
{

  protected $entity = [];
  protected $object = '';
  protected $item;

  protected function checkExit($itemId)
  {
      $item = Cart::get($itemId);

      if (!$item) {
        return false;
      }
      $this->object  = $item->attributes->object;
      return $item;
  }

  /* Method to add or desc or delete a object in cart
  * If case is add , the quantity object will add with 1
  * If case is desc , the quantity object will desc with 1
  * If quantity <= 1 , the desc will remove object in cart
  */
  protected function switchMethod($method, $item)
  {
    switch ($method) {
      case 'add':
           $item->quantity++;
        break;
      case 'delete':
         if($item->quantity<=1)
         {
           Cart::remove($item->id);
           break;
         }
        $item->quantity--;
        break;
      default:
          return false;
        break;
    }
    return true;
  }
  /* The method will get a object form database by chossing type
  *  If case is car , then object is return in car model
  *  If case is hotel , then object is return in hotel model
  *  If case is tour , then object is return in tour model
  */
  protected function switchObj($type,$id)
  {
    switch ($type) {
      case 'car':
          $this->object = $this->class(Car::class)->getbyIdOrfind($id);
        break;
      case 'hotel':
          $this->object = $this->class(Hotel::class)->getbyIdOrfind($id);
        break;
      case 'tour':
          $this->object = $this->class(Tour::class)->getbyIdOrfind($id);
        break;
      default:
        break;
      }
  }
  /* Method will store a Bill
  * Method is return a new object bill
  */
  protected function storeBill($payment)
  {
    $data = [
      'id_customer' => $this->user()->id,
      'total'       => Cart::getSubTotal(),
      'pay'         => $payment,
    ];
    return $this->create(Bill::class,$data);
  }
  /* Method will store a Bill
  * Method is return a new object list book
  */
  protected function storeListBook($id_bill,$id_book,$type)
  {
      $data = [
        'id_bill' =>$id_bill,
        'id_book' =>$id_book,
        'type'    =>$type,
      ];

      return $this->create(ListBook::class,$data);
  }
  /* Method will store a Bill
  * Method is return a new object book
  */
  protected function storeBook($obj)
  {
    $data = [
      'book'        => $obj->attributes->object->id,
      'unit'        => $obj->quantity,
      'price'       => $obj->price,
    ];

    return $this->create(Book::class,$data);

  }
  protected function updateNumberSeate($object,$seated)
  {
    // Get information Tour before update

    $number_seateBefore = $object->book;
    // // Data update ;
    $number_seateLast =  $number_seateBefore + $seated;

    $object->updateOrCreateNew([
      'id' => $object->id,
      'book' => $number_seateLast
    ]);

  }

  /*
  * Method to check the car, hotel,tour , can book
  * If $quantity < seat - book or room - book
  * then return true
  * else return false
  */
  protected function canBook($quantity)
  {
      if($this->object->room)
      {
        $seat = $this->object->room;
      }
      if($this->object->seat)
      {
        $seat = $this->object->seat;
      }
      $canBook = $seat - $this->object->book;

      return ($canBook >= $quantity) ? true : false;
  }

  protected function handleItem($objectId ,$objectType,$customer)
  {
      if($customer)
      {
        $id = $objectType.'-'.$objectId.'-customer';
      }
      else
      {
        $id = $objectType.'-'.$objectId;
      }
      ///check exit
      $this->item = $this->checkExit($id);
      /// if item = false then create new iteam
      if(!$this->item)
      {
        $this->switchObj($objectType,$objectId);
        if($this->object !== '')
        {
          $this->entity = [
            'id'   => $id,
            'name' => $this->object->name ,
            'price'=> $this->object->unit_price,
            'quantity'=> 1,
            'attributes' => [
                  'object' => $this->object,
                  'type'   => $objectType,
                  'customer' => $customer,
          ]];
        }
      }

  }

  protected function user()
  {
    return Auth::guard('customer')->user();
  }

  protected function create($class,$data)
  {
    return $this->class($class)->create($data);
  }

  protected function class($class)
  {
    return new $class;
  }


}
