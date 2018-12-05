<?php
namespace App\Interfaces;

interface CustomerServiceInterface
{
  public function index();
  public function show($id);
  public function update($request,$id);
  public function destroy($id);
  public function attachToRole($request, $id);

}
