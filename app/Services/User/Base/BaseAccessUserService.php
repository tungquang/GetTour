<?php
namespace App\Services\User\Base;

/**
 *
 */
use Auth;
use App\Model\Cites;
use App\Model\Role;
use App\Model\RoleUser;
use App\Model\UserDetail;
use App\Services\File\AccessUploadFile;

abstract class BaseAccessUserService extends AccessUploadFile
{
  protected $user;

  protected function checkAccessPermission($id='')
  {
      $this->checkExit($id);
      if (!Auth::user()->can('user')) {
        if (Auth::user()->id !== $this->user->id) {
          throw new \Exception("Account not found", 1);
        }
      }
      return true;
  }

  protected function detail()
  {
    return new UserDetail();
  }
  protected function city()
  {
    return new Cites;
  }
  protected function user()
  {
    return Auth::user();
  }
  protected function role()
  {
    return new Role();
  }
  protected function checkExit($id)
  {
    $staff = $this->staff->getbyIdOrfind($id);
    if (is_null($staff)) {
      throw new \Exception("User not found", 1);
    }
    $this->user = $staff;
    return true;
  }
}
