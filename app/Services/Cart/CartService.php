<?php
namespace App\Services\Cart;

use Response;
use Cart;
use App\Interfaces\CartServiceInterface;
use App\Services\Cart\Base\BaseAccessCartService;

/**
 *@return App\Htpp\CartController;
 */
class CartService extends BaseAccessCartService implements CartServiceInterface
{
  protected $flage = true;
  //Method is show list cart in cart
  public function index()
  {
      $user = $this->user();
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
  public function add($objectId ,$objectType,$customer)
  {
        //make data cart array
        $this->handleItem($objectId ,$objectType,$customer);
        /// check item has in cart ?
        $quan = ($this->item) ? ($this->item->quantity + 1) : 0;

        if($this->canBook($quan) || $customer)
        {
            try {
              Cart::add($this->entity);
            } catch (\Exception $e) {
              $this->flage =false;
            }
        }
        else
        {
            $this->flage =false;
        }
      return response()->json($this->flage);
  }
  /*
  * Method is update quantity object in cart
  *If method is add then quantity of item will up to with 1;
  *If method is delete then quantity of item will down to with 1 or delete;
  */
  public function update($method, $itemId, $objectType)
  {
      $flage = true;
      //Check item has in cart
      $item = Cart::get($itemId);

      $this->object = $item->attributes->object;

      if (!$item) {
        $flage = false;
        return response()->json($flage);
      }
      if($item->attributes->customer)
      {
        if (!$this->switchMethod($method,$item)) {
          $flage = false;
        }
      }
      else
      {
        if( $this->canBook($item->quantity + 1)
            || ($method=='delete') )
        {
          //Switch method/
          if (!$this->switchMethod($method , $item)) {
            $flage = false;
          }
        }
      }

      //check can book
      $list = Cart::getContent();

      $view = view('cart.list-render')
                        ->with(['list' => $list])
                        ->render();
      $view = ($flage) ? $view : $flage;
      //Return list data
      return response()->json($view);
  }
  /*
  * Method is edit the quantity object in cart
  * If $quan <= 0 , then to remove object in cart
  */
  public function edit($itemId, $objectType, $quan)
  {
      $flage = false;
      $item = $this->checkExit($itemId);
      //Check item has in cart
      if($item)
      {
        //Update item or remove
        if ($quan<=0) {
          Cart::remove($itemId);
        }
        else
        {
          if($item->attributes->customer){
              $item->quantity = $quan;
          }
          else
          {
              if( $this->canBook($quan) )
              {
                $item->quantity = $quan;
              }
              else
              {
                return response()->json($flage);
              }
          }

        }

        $list = Cart::getContent();

        $flage = view('cart.list-render')
                          ->with(['list' => $list])
                          ->render();
      }
      return response()->json($flage);
  }
  /*
  * Method to submit cart to bill
  * When the cart is submit , The cart will be clear
  * If customer = true , the tour table is not update
  * Else update numberset in tour table
  */
  public function submit($payment)
  {
      if(Cart::isEmpty())
      {
          return abort('404','Not found cart');
      }

      $user = $this->user();
      $list = Cart::getContent();
      // create new Bill
      $bill_id = $this->storeBill($payment);
      // create new obj
      foreach ($list as $obj) {

        if(!$obj->attributes->customer || ($obj->type == 'car'))
        {
          $this->updateNumberSeate($obj->attributes->object,$obj->quantity);
        }

        $book = $this->storeBook($obj);
        $this->storeListBook($bill_id->id,$book->id,$obj->attributes->type);
      }
      // Clear cart after create bill
      Cart::clear();

      return view('cart.bill')
                ->with([
                      'list'  =>  $list,
                      'user'  =>  $user,
                      'total' =>  $bill_id->total,
      ]);
  }

}
