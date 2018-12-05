<?php
  namespace App\Interfaces;
  /**
   *
   */
  interface UserServiceInterface
  {
    public function index();
    // public function store(Request $request);
    public function show($id);
    public function update($request, $id);
    public function destroy($id);
    public function attachToRole($request, $id);

  }
