<?php
namespace App\Interfaces;

/**
 *
 */
interface PermissionServiceInterface
{
  public function store($request);
  public function update($request,$id);
  public function destroy($id);
}
