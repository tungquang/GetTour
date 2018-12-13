<?php
namespace App\Interfaces;

/**
 *
 */
interface CartServiceInterface
{
  public function index();
  public function add($objectId, $objectType ,$customer);
  public function update($method, $itemId, $objectType);
  public function edit($itemId, $objectType, $quan);
  public function submit($payment);

}
