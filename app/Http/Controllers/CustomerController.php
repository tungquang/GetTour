<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\Interfaces\CustomerServiceInterface;
use Illuminate\Support\Facades\Validator;


class CustomerController extends Controller
{
      public function __construct(CustomerServiceInterface $customerService)
      {
        $this->middleware('customer-auth')->only(['show','update']);
        $this->middleware('auth')->except(['show','update']);
        $this->middleware('permission:delete-customer')->only(['destroy','indexBan']);
        $this->customerService = $customerService;
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
     * @return \Illuminate\Http\customerService
     */
    public function index()
    {
        return $this->customerService->index();
    }

    /**
     * Show the customẻ is disable
     *
     * @return \Illuminate\Http\customerService
     */
    public function indexBan()
    {
        return $this->customerService->indexBan();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\customerService
     */
    public function store(Request $request)
    {
        abort('404','Not found method');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\customerService
     */
    public function show($id)
    {
        try {
          return $this->customerService->show($id);
        } catch (\Exception $e) {
          abort('404',$e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\customerService
     */
    public function edit($id)
    {
        abort('404','Not found method');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\customerService
     */
    public function update(Request $request, $id)
    {
        $this->validator($request->all(),$this->rulesDetail())->validate();

        try {
            $this->customerService->update($request, $id);
        } catch (\Exception $e) {
            abort('404',$e->getMessage());
        }
        return redirect()->route('customer.show',['customer'=>$id]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\customerService
     */
    public function destroy($id)
    {
        if(!isset($_GET['status']))
        {
          return Response::json(['errors'=>'Thao tác không thành công']);
        }
        return $this->customerService->destroy($id,$_GET['status']);
    }
}
