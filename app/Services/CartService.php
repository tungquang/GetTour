<?php
namespace App\Services;

use Response;
use App\Model\Tour;
use App\Model\Car;
use App\Model\Hotel;
use Cart;
use Auth;
use App\Model\Bill;
use App\Model\Book;
use App\Model\ListBook;
use App\Interfaces\CartServiceInterface;

/**
 *@return App\Htpp\CartController;
 */
class CartService implements CartServiceInterface
{

  public function __construct(Tour $tour,Car $car,Hotel $hotel)
  {
    $this->car = $car;
    $this->tour = $tour;
    $this->hotel = $hotel;

  }
  //Method is show list cart in cart
  public function index()
  {
    $user = Auth::guard('customer')->user();
    $list = Cart::getContent();

    return view('cart.cart-list')
            ->with([
                'list'=>$list,
                'user' =>$user,
    ]);

  }
  
  /*
  *
  * Method to add product to cart or update cart with default
  */
  public function add($objectId ,$objectType, $customer)
  {
    //check inform from data basse
    $object = $this->switchObj($objectType,$objectId);
    // if object is null . then return null
    if(!$object)
    {
      return $object;
    }
    //make data cart array
    //if customer = true
    if($customer)
    {
      $data = array(
        'id'=>$objectType.'-'.$objectId.'-customer',
        'name' =>$object->name ,
        'price'=>$object->unit_price,
        'quantity'=> 1,
        'attributes' => array(
              'object' => $object,
              'type' => $objectType,
              'customer' => $customer,
      ),);
    }
    //if customer = false
    else
    {
      $data = array(
        'id'=>$objectType.'-'.$objectId,
        'name' =>$object->name ,
        'price'=>$object->unit_price,
        'quantity'=> 1,
        'attributes' => array(
              'object' => $object,
              'type' => $objectType,
              'customer' => $customer,
      ),);
    }

    // add to cart
    $cart = Cart::add($data);

    return response()->json($value = true);
  }
  /*
  * Method is update quantity object in cart
  */
  public function update($method, $itemId, $objectType)
  {

    //Check item has in cart
    $item = Cart::get($itemId);
    if (!$item) {
      return response()->json($value = false);
    }
    //Switch method/
    if (!$this->switchMethod($method , $item)) {
      return response()->json($value = false);
    }
    //Return list data
    $list = Cart::getContent();

    $view = view('cart.list-render')
                      ->with(['list' => $list])
                      ->render();

    return response()->json($view);
  }
  /*
  * Method is edit the quantity object in cart
  * If $quan <= 0 , then to remove object in cart
  */
  public function edit($itemId, $objectType, $quan)
  {
    //Check item has in cart
    $item = Cart::get($itemId);

    if (!$item) {
      return response()->json($value = false);
    }
    //Update item or remove
    if ($quan<=0) {
      Cart::remove($itemId);
    }
    else
    {
      $item->quantity = $quan;
    }

    $list = Cart::getContent();

    $view = view('cart.list-render')
                      ->with(['list' => $list])
                      ->render();

    return response()->json($view);
  }
  /*
  * Method to submit cart to bill
  * When the cart is submit , The cart will be clear
  * If customer = true , the tour table is not update
  * Else update numberset in tour table
  */
  public function submit($payment)
  {

    $user = Auth::guard('customer')->user();

    $list = Cart::getContent();
    // create new Bill
    $bill_id = $this->storeBill($payment);
    // create new obj
    foreach ($list as $obj) {

      if(!$obj->attributes->customer)
      {
        $this->updateNumberSeate($obj->attributes->object,$obj->quantity);
      }
      $book = $this->storeBook($obj);
      $this->storeListBook($bill_id->id,$book->id,$obj->attributes->type);
    }
    // Clear cart after create bill
    Cart::clear();

    return view('cart.bill')->with([
                        'list'  =>  $list,
                        'user'  =>  $user,
                        'total' =>  $bill_id->total,
                      ]);

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
          return $item->quantity++;
        break;
      case 'delete':
         if($item->quantity<=1)
         {
           Cart::remove($itemId);
           break;
         }
         return $item->quantity--;
        break;
      default:
          return response()->json($value = false);
        break;
    }
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
          return $this->car->getbyIdOrfind($id);
        break;
      case 'hotel':
          return $this->hotel->getbyIdOrfind($id);
        break;
      case 'tour':
          return $this->tour->getbyIdOrfind($id);
        break;

      default:
           return false;
        break;

      }
  }
  /* Method will store a Bill
  * Method is return a new object bill
  */
  private function storeBill($payment)
  {
    $data = [
      'id_customer' => Auth::guard('customer')
                                  ->user()->id,
      'total'       => Cart::getSubTotal(),
      'pay'         => $payment,
    ];
    return Bill::create($data);
  }
  /* Method will store a Bill
  * Method is return a new object list book
  */
  private function storeListBook($id_bill,$id_book,$type)
  {
    $data = [
      'id_bill'=>$id_bill,
      'id_book'=>$id_book,
      'type'   =>$type,
    ];

    return ListBook::create($data);
  }
  /* Method will store a Bill
  * Method is return a new object book
  */
  private function storeBook($obj)
  {
    $data = [
      'book'        => $obj->attributes->object->id,
      'unit'        => $obj->quantity,
      'price'       => $obj->price,
    ];

    return Book::create($data);

  }
  private function updateNumberSeate($object,$seated)
  {

    // Get information Tour before update

    $number_seateBefore = $object->number_seated;

    // // Data update ;
    $number_seateLast =  $number_seateBefore + $seated;

    $object->updateOrCreateNew([
      'id' => $object->id,
      'book' => $number_seateLast
    ]);

  }

}
