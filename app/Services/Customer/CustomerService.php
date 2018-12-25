<?php
namespace App\Services\Customer;

use Response;
use App\Model\Customer;
use App\Interfaces\CustomerServiceInterface;
use App\Services\Customer\Base\BaseAccessCustomerService;
 /**
  *
  */
 class CustomerService extends BaseAccessCustomerService implements CustomerServiceInterface
 {
   public function __construct(Customer $customer)
   {
     $this->customer = $customer;
   }
   /*Method to show all customer was active
   */
   public function index()
   {
     $this->checkAccess();
     $customer = $this->customer->getAll();

     return view('admin.customer.customer-list')->with([
           'list' => $customer,
           'user' => $this->user,
      ]);
   }

   /*Method to show all customer was disable
   */
   public function indexBan()
   {
     $this->checkAccess();
     $customer = $this->customer->getBan();

     return view('admin.customer.customer-trash')->with([
           'listBan' => $customer,
           'user' => $this->user,
      ]);
   }

   public function show($id)
   {
      $this->checkAccess($id);
      return $this->showDetail($id,$this->user);
   }
   /*Method to update the informatin customer
   *
   */
   public function update($request, $id)
   {
       $this->checkAccess($id);

       $customer = $this->customer->getbyIdOrfind($id);

       if(!$customer)
       {
         throw new \Exception("Account not found", 1);
       }
       $detail = $request->except(['_method','_token','gender','name','email','photo']);
       $detail['id']  = $id;
       $account = $request->only(['name','email']);

       // If has file then the new avatar will be update
       if ($request->photo)
       {
         $this->UploadFile($request);
         if ($this->img !== '')
         {
           $detail['img'] = $this->img;
         }
       }
       $this->detail()->updateOrCreateNew($detail);
       $customer->update($account);
   }
   /*Method to acttive or disable a account
   * if status = 0 then the account is actived
   * else then the account is diable
   */
   public function destroy($id, $status)
   {
     $customer = $this->customer->DeleteOrGet($id, $status);

     if (!$customer)
     {
       return Response::json(['errors'=>'Thao tác không thành công']);
     }
     return Response::json(['id' => $id,]);
   }

   private function showDetail($id,$user)
   {
     $customer = $this->customer->getbyIdOrfind($id);
     if ($customer) {
        return view('admin.customer.profile')->with([
              'customer' => $customer,
              'user'     => $user,
              'cities'   => $this->city()->all()
        ]);
      }
   }


 }
