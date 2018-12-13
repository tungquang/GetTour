<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Bill;
use Auth;

class BillController extends Controller
{
  public function __construct()
  {
      $this->middleware('permission:bill');

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
}
