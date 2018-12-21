<?php
namespace App\Services;


use Auth;
use Response;
use App\Model\Cites;
use App\Model\Customer;
use App\Model\CustomerDetail;
use App\Interfaces\CustomerServiceInterface;
use App\Traits\StorageFunction;

 /**
  *
  */
 class CustomerService implements CustomerServiceInterface
 {
   // traits to work with file
   use StorageFunction;

   private $image = 'default-user.png';

   public function __construct(Customer $customer,CustomerDetail $detail)
   {
     $this->detail = $detail;
     $this->customer = $customer;
   }
   /*Method to show all customer was active
   */
   public function index()
   {
     try {
       $user = Auth::user();
     } catch (\Exception $e) {
       abort('404','Request not found');
     }

     $customer = $this->customer->getAll();

     return view('admin.customer.customer-list')
                  ->with(
                    [
                      'list' => $customer,
                      'user' => $user,
                  ]);
   }

   /*Method to show all customer was disable
   */
   public function indexBan()
   {
     $user = Auth::user();

     $customer = $this->customer->getBan();

     return view('admin.customer.customer-trash')
                  ->with(
                    [
                      'listBan' => $customer,
                      'user' => $user,
                  ]);
   }

   public function show($id)
   {

     $customer = $this->customer->getbyIdOrfind($id);

     if(Auth::user())
     {
       $user = Auth::user();
     }
    else
    {
        $user = $this->user($id);
    }

     if ($customer) {

       return view('admin.customer.profile')
                       ->with(
                         [
                           'customer' => $customer,
                           'user'     => $user,
                           'cities'   => Cites::all()
                       ]);

     }
     $errors = 'Tài khoản không tồn tại !';
     return view('errors.notfound')->with(['errors'=>$errors]);

   }
   /*Method to update the informatin customer
   *
   */
   public function update($request,$id)
   {

     $user = $this->user($id);
     // If the detail wasn't isset then $image was đefaul
     try {
        $image = $user->detail->img;
     } catch (\Exception $e) {
       $image = $this->image;
     }
     // If has file then the new avatar will be update
     if($request->file)
     {
      $flage = $this->hasImage($request->file);

      if($flage)
      {
        $flage = $this->putFile('public',$request->file);
      }

      $image = ($flage) ? $flage['name'] : $image;
     }



     $detail = [
       'id'       => $user->id,
       'address'  => $request->address,
       'age'      => $request->age,
       'phone'    => $request->phone,
       'sex'      => $request->sex,
       'passport' => $request->passport,
       'id_country' => $request->id_country,
       'img'      => $image
     ];

     $data = [
      'id'    => $user->id,
      'name'  => $request->name,
      'email' =>$request->email,
      ];

      $this->detail->updateOrCreateNew($detail);
      $customer = $this->customer->updateOrCreateNew($data);

    return redirect()->route('customer.show',['customer'=>$id]);

   }
   /*Method to acttive or disable a account
   * if status = 0 then the account is actived
   * else then the account is diable
   */
   public function destroy($id,$status)
   {
     $customer = $this->customer->DeleteOrGet($id,$status);

     if(!$customer)
     {
       return Response::json(['errors'=>'Thao tác không thành công']);
     }

     $customer = $this->customer->find($id);

     return Response::json([
                  'id'       => $id,
                ]);
   }

   public function attachToRole($request, $id)
   {
     return response()->json($id);
   }

   protected function user($id)
   {
      if (Auth::guard('customer')->user()) {
        return Auth::guard('customer')->user();
      }
    return $this->customer->getbyIdOrfind($id);
   }

 }
