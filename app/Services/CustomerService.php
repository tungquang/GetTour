<?php
namespace App\Services;


use Auth;
use Response;
use App\Model\Customer;
use App\Model\CustomerDetail;
use App\Interfaces\CustomerServiceInterface;

 /**
  *
  */
 class CustomerService implements CustomerServiceInterface
 {

   public function __construct(Customer $customer,CustomerDetail $detail)
   {

     $this->detail = $detail;
     $this->customer = $customer;
   }

   public function index()
   {
     if(Auth::guard()->user())
     {
       $user = Auth::guard()->user();
     }
     if(Auth::guard('customer')->user())
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

     if (Auth::guard('customer')->user()) {
       $user = Auth::guard('customer')->user();
     }
     if (Auth::guard()->user()) {
       $user = Auth::guard()->user();
     }
     if ($customer) {

       return view('admin.customer.profile')
                       ->with(
                         [
                           'customer' => $customer,
                           'user'     => $user,
                       ]);

     }
     $errors = 'Tài khoản không tồn tại !';
     return view('errors.notfound')->with(['errors'=>$errors]);

   }
   public function update($request,$id)
   {

     if(Auth::guard('customer')->user())
     {
       $id = Auth::guard('customer')->user()->id;
     }

     $detail = [
       'id'       => $id,
       'address'  => $request->address,
       'age'      => $request->age,
       'phone'    => $request->phone,
       'sex'      => $request->sex,
       'passport' => $request->passport,
       'id_country' => $request->id_country
     ];

     $data = [
      'id'    => $id,
      'name'  => $request->name,
      'email' =>$request->email,
      ];

      $this->detail->updateOrCreateNew($detail);
      $customer = $this->customer->updateOrCreateNew($data);

    return redirect()->route('customer.show',['customer'=>$id]);

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
   public function attachToRole($request, $id)
   {
     return response()->json($id);
   }

 }
