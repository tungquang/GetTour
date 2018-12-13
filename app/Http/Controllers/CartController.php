<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\Interfaces\CartServiceInterface;

class CartController extends Controller
{
    public function __construct(CartServiceInterface $response)
    {
      $this->middleware('customer-auth')->only(['submit']);
      $this->response = $response;

    }
    /* Method to show the list object in cart;
    */
    public function index()
    {
      return $this->response->index();
    }
    /* Method to add a object into cart
    */
    public function add()
    {
      $objectId = $_GET['product'];
      $objectType = $_GET['type'];
      $customer = (isset($_GET['customer'])) ?  $_GET['customer'] : false;

      return $this->response->add($objectId, $objectType ,$customer);
    }
    /* Method to update quantity a object in cart
    */
    public function update()
    {
      //get infor of item
      $method = $_GET['method'];
      $itemId = $_GET['item'];
      $objectType = $_GET['type'];
      return $this->response->update($method, $itemId, $objectType);
    }
    /* Method to edit the quantity of object in cart
    */
    public function edit()
    {
      //get infor item
      $itemId = $_GET['item'];
      $objectType = $_GET['type'];
      $quan = $_GET['quantity'];

      return $this->response->edit($itemId, $objectType, $quan);
    }
    /* Method to create a bill
    */
    public function submit()
    {
      $payment = $_GET['payment'];
      return $this->response->submit($payment);
    }
}
