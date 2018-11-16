<?php
namespace App\Services;

use App\Interfaces\CustomerServiceInterface;
use Response;
use App\Model\Customer;
use App\Model\CustomerDetail;
use Auth;
use Illuminate\Support\Facades\Validator;

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
   protected function validator(array $data,$rules)
   {
     return Validator::make($data,$rules);
   }
   protected function rulesAccount()
   {
     return [
       'email' => 'required|string|email|max:255',
       'name'  => 'required|string|min:4',
       'password' => 'required|string|min:6',

      ];
   }
   protected function rulesDetail()
   {
     return [
       'id'       => 'required',
       'address'  => 'required',
       'age'      => 'required',
       'phone'    => 'required|min:9',
       'passport' => 'required|min:9',
       'id_country' => 'required',
     ];
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
     $errors = ['account' => 'Tài khoản không tồn tại !'];
     return Response::json(['erros' => $errors]);
   }
   public function update($request,$id)
   {
     // $this->validator($request->all(),$this->rulesDetail())->validate();
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


 }
