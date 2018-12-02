<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\Model\Tour;
use App\Model\Car;
use App\Model\Hotel;
use Cart;
use Auth;
use App\Model\Bill;
use App\Model\Book;
use App\Model\ListBook;

class CartController extends Controller
{
    public function __construct(Tour $tour,Car $car,Hotel $hotel)
    {
      $this->car = $car;
      $this->tour = $tour;
      $this->hotel = $hotel;
      $this->middleware('customer-auth')->only(['submit','index']);

    }
    public function index()
    {
      $user = Auth::guard('customer')->user();
      $list = Cart::getContent();

      return view('cart.cart-list')->with([
                          'list'=>$list,
                          'user' =>$user,
                        ]);

    }
    /*
    * return Response
    * method to add product to cart or update cart with default
    */
    public function add()
    {

      $objectId = $_GET['product'];
      $objectType = $_GET['type'];
      //check inform from data basse
      $object = $this->switchObj($objectType,$objectId);
      // if object is null . then return null
      if(!$object)
      {
        return $object;
      }
      //make data cart array
      $data = array(
        'id'=>$objectType.'-'.$objectId,
        'name' =>$object->name ,
        'price'=>$object->unit_price,
        'quantity'=> 1,
        'attributes' => array(
              'object' => $object,
              'type' => $objectType,
      ),);

      $cart = Cart::add($data);

      return response()->json($value = true);
    }
    public function update()
    {
      //get infor of item
      $method = $_GET['method'];
      $itemId = $_GET['item'];
      $objectType = $_GET['type'];
      //check item has in cart
      $item = Cart::get($itemId);
      if (!$item) {
        return response()->json($value = false);
      }
      //switch method
      switch ($method) {
        case 'add':
            $item->quantity++;
          break;
        case 'delete':
           if($item->quantity<=1)
           {
             Cart::remove($itemId);
             break;
           }
           $item->quantity--;
          break;
        default:
            return response()->json($value = false);
          break;
      }
      //return list data
      $list = Cart::getContent();
      $view = view('cart.list-render')
                        ->with(['list' => $list])
                        ->render();

      return response()->json($view);
    }
    public function edit()
    {
      //get infor item
      $itemId = $_GET['item'];
      $objectType = $_GET['type'];
      $quan = $_GET['quantity'];
      //check item has in cart
      $item = Cart::get($itemId);
      if (!$item) {
        return response()->json($value = false);
      }
      //update item or remove
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
    public function submit()
    {

      $user = Auth::guard('customer')->user();
      $list = Cart::getContent();
      $payment = $_GET['payment'];

      $bill_id     = $this->storeBill($payment);

      foreach ($list as $obj) {
        $book = $this->storeBook($obj);
        $this->storeListBook($bill_id->id,$book->id,$obj->attributes->type);
      }
        // clear cart after create bill
      Cart::clear();
      return view('cart.bill')->with([
                          'list'  =>  $list,
                          'user'  =>  $user,
                          'total' =>  $bill_id->total,
                        ]);

    }
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
    private function storeBill($payment)
    {
      $data = [
        'id_customer' => Auth::guard('customer')
                                      ->user()
                                      ->id,
        'total'       => Cart::getSubTotal(),
        'pay'         => $payment,
      ];
      return Bill::create($data);
    }
    private function storeListBook($id_bill,$id_book,$type)
    {
      $data = [
        'id_bill'=>$id_bill,
        'id_book'=>$id_book,
        'type'   =>$type,
      ];

      return ListBook::create($data);
    }
    private function storeBook($obj)
    {
      $data = [
        'book'        => $obj->attributes->object->id,
        'unit'        => $obj->quantity,
        'price'       => $obj->price,
      ];

      return Book::create($data);

    }

}
