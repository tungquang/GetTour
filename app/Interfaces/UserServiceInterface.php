<?php
  namespace App\Interfaces;
  /**
   *
   */
  interface UserServiceInterface
  {
    public function index();

    public function indexBan();

    public function show($id);

    public function update($request, $id);

    public function destroy($id,$status);

    public function attachToRole($request, $id);

  }
