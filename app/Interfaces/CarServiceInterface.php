<?php
namespace App\Interfaces;

/**
 *
 */
interface CarServiceInterface
{
  public function index();

  public function indexBan();

  public function create();

  public function store($request);

  public function show($id);

  public function edit($id);

  public function update($request, $id);

  public function destroy($id,$status);

}
