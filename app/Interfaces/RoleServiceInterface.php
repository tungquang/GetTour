<?php
namespace App\Interfaces;

/**
 *
 */
interface RoleServiceInterface
{
  public function index();
  public function store($request);
  public function update($request, $id);
  public function attachToPermission($request, $id);
  public function destroy($id);
}
