<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Bill;
use Auth;
use App\Model\Customer;
use App\Model\ListBook;

class BillController extends Controller
{
  public function __construct(Bill $bill,ListBook $listbook)
  {
    if(Auth::user())
    {
      $this->middleware('permission:bill');
    }
    else
    {
      $this->middleware('customer-auth')->only(['billOfCustomer','detailbillOfCustomer']);
    }


      $this->listbook = $listbook;
      $this->bill = $bill;
  }

  public function newBill()
   {
     return view('admin.bill.new-bill')
                ->with([
                  'user' => Auth::user(),
                  'list' => Bill::getNewBill(),
                ]);
   }
  public function chekedBill()
   {
     return view('admin.bill.checked-bill')
                ->with([
                 'user' => Auth::user(),
                 'list' => Bill::getCheckedBill()
               ]);
   }
  public function detail($id_bill)
  {
    $bill = $this->bill->find($id_bill);
    $list = $this->listbook->getByType($bill->id);

    if($bill)
    {

      return view('admin.bill.detail-bill')->with([
          'bill' => $bill,
          'list' => $list,
          'user' => $this->user()
      ]);

    }
    abort(403, 'Not found');

  }
  public function billOfCustomer()
  {

    $customer = $this->user();
    $list = Bill::where('id_customer',$customer->id)->get();
    return view('admin.bill.bill-customer')
               ->with([
                 'user' => $this->user(),
                 'list' => $list,
               ]);
  }
  public function detailbillOfCustomer($id_bill)
  {
    $bill = $this->bill->find($id_bill);
    $list = $this->listbook->getByType($bill->id);

    if($bill)
    {

      return view('admin.bill.detail-bill')->with([
          'bill' => $bill,
          'list' => $list,
          'user' => $this->user()
      ]);

    }
    abort(403, 'Not found');

  }
  public function check($id_bill)
  {
    $flage = $this->bill->check($id_bill);
    
    if($flage)
    {
      return $this->chekedBill();
    }
    else
    {
      abort(403, 'Not found');
    }


  }
  protected function user()
  {
    return (Auth::user()) ? Auth::user() : Auth::guard('customer')->user();
  }
}
