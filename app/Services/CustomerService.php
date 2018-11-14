<?php
namespace App\Services;

use App\Interfaces\CustomerServiceInterface;
use Response;
use App\Model\Customer;
use Auth;

 /**
  *
  */
 class CustomerService implements CustomerServiceInterface
 {

   public function __construct(Customer $customer)
   {
     $this->customer = $customer;
   }
   public function index()
   {
     if(Auth::guard()->user())
     {
       $user = Auth::guard()->user();
     }
     else
     {
       $user = Auth::guard('customer')->user();
     }
     $customer = $this->customer->getAll();
     return view('admin.customer.customer-list')
                  ->with(
                    [
                      'list' => $customer,
                      'user' => $user,
                  ]);
   }
   public function show($id)
   {
     $customer = $this->customer->getbyIdOrfind($id);
     if ($customer) {

       return view('admin.customer.profile')
                       ->with(
                         [
                           'customer' => $customer,
                           'user'     => $customer
                       ]);

     }
     $errors = ['account' => 'Tài khoản không tồn tại !'];
     return Response::json(['erros' => $errors]);
   }
   public function destroy($id)
   {
     $customer = $this->customer->DeleteOrGet($id,0);
     if(!$customer)
     {
       return Response::json(['errors'=>'Thao tác không thành công']);
     }
     return response()->json($customer);
   }
 }
