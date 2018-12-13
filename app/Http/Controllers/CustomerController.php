<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\Interfaces\CustomerServiceInterface;
use Illuminate\Support\Facades\Validator;


class CustomerController extends Controller
{
      public function __construct(CustomerServiceInterface $response)
      {
        $this->middleware('customer-auth')->only(['show','update']);
        $this->middleware('auth')->except(['show','update']);
        $this->middleware('permission:delete-customer')->only(['destroy','indexBan']);
        $this->response = $response;
      }
      protected function validator(array $data,$rules)
      {
        return Validator::make($data,$rules);
      }
      protected function rulesAccount()
      {
        return [
          'email' => 'required|string|email|max:255',
          'name'  => 'required|string|min:4',
          'password' => 'required|string|min:6',

         ];
      }
      protected function rulesDetail()
      {
        return [
          'address'  => 'required',
          'age'      => 'required',
          'phone'    => 'required|min:9',
          'passport' => 'required|min:9',
          'id_country' => 'required',
        ];
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    public function attachToRole($request, $id)
    {
      return $this->response->attachToRole($request, $id);
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
        dd('xxx1');
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
        $this->validator($request->all(),$this->rulesDetail())->validate();
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
}
