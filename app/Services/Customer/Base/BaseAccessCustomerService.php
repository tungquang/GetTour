<?php
namespace App\Services\Customer\Base;

/**
 *
 */
use Auth;
use App\Model\CustomerDetail;
use App\Model\Cites;
use App\Services\File\AccessUploadFile;

abstract class BaseAccessCustomerService extends AccessUploadFile
{
  protected $user;

  protected function checkAccess($id='')
  {
    $customer = $this->customer->getbyIdOrfind($id);
    if(Auth::user()) {
      $user = Auth::user();
    } else {
       $user = Auth::guard('customer')->user();
       if($user->id !== $customer->id)
       {
         throw new \Exception("Account not found", 1);
       }
     }
    $this->user = $user;
    return true;
  }

  protected function detail()
  {
    return new CustomerDetail();
  }
  protected function city()
  {
    return new Cites;
  }


}
