<?php

namespace App\Http\Controllers;

use Response;
use Illuminate\Http\Request;
use App\Interfaces\UserServiceInterface;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /*
    *
    */
    public function __construct(UserServiceInterface $response)
    {
      $this->middleware('auth');
      $this->middleware('role:own')->only(['attachToRole']);
      $this->middleware('permission:user')->except(['show','update']);
      $this->middleware('permission:delete-user')->only(['destroy']);
      $this->response = $response;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return $this->response->index();
    }

    /**
     * Show the customẻ is disable
     *
     * @return \Illuminate\Http\Response
     */
    public function indexBan()
    {
        return $this->response->indexBan();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->response->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        return $this->response->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return $this->response->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)
     {
         if(!isset($_GET['status']))
         {
           return Response::json(['errors'=>'Thao tác không thành công']);
         }
         return $this->response->destroy($id,$_GET['status']);
     }

     /*Method to create role for user
     */
    public function attachToRole(Request $request, $id)
    {
      return $this->response->attachToRole($request, $id);
    }
}
