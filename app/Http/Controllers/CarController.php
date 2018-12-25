<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\CarServiceInterface;
use Illuminate\Support\Facades\Validator;

class CarController extends Controller
{
  public function __construct(CarServiceInterface $carService)
  {
    $this->middleware('auth')->except(['show']);
    $this->middleware('permission:car')->except(['show']);
    $this->middleware('permission:create-car')->only(['store']);
    $this->middleware('permission:edit-car')->only(['update','edit']);
    $this->middleware('permission:delete-car')->only(['destroy']);
    $this->carService = $carService;

  }

  protected function validator($data)
  {
    return Validator::make($data,$this->rules(),$this->messesges());
  }

  protected function rules()
  {
    return [
      'name'        => 'required|string|max:255',
      'content'     => 'required',
      'seat'        => 'required|min:2',
      'unit_price'  => 'required',
      'description' =>'required'
    ];
  }
  protected function messesges()
  {
    return [
      'name.required'          => 'Yêu cầu điền tên Tour',
      'content.required'       => 'Thiếu nội dung của Tour',
      'seat.required'          => 'Số ghế đặt không phù hợp',
      'seat.min'               => 'Số ghế đặt không phù hợp',
      'unit_price.required'    => 'Yêu cầu điền giá Tour',
      'description.required'   => 'Thiếu mô tả cơ bản'
    ];
  }


  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\carService
   */
  public function index()
  {

      return $this->carService->index();
  }

  /**
   * Show the customẻ is disable
   *
   * @return \Illuminate\Http\carService
   */
  public function indexBan()
  {
      return $this->carService->indexBan();
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\carService
   */
  public function create()
  {
      return $this->carService->create();
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\carService
   */
  public function store(Request $request)
  {
      $this->validator($request->all())->validate();

      try {
           $this->carService->handingAttributes($request);
      } catch (\Exception $e) {

        abort('403',$e->getMessage());
      }
      return redirect()->route('car.index');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\carService
   */
  public function show($id)
  {
    return $this->carService->show($id);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\carService
   */
  public function edit($id)
  {
      return $this->carService->edit($id);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\carService
   */
  public function update(Request $request, $id)
  {

      $this->validator($request->all())->validate();
      try {
        $this->carService->update($request, $id);
      } catch (\Exception $e) {

        abort('403',$e->getMessage());
      }

      return redirect()->route('car.edit',['id'=>$id]);


  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\carService
   */
   public function destroy($id)
   {
       if(!isset($_GET['status']))
       {
         return carService::json(['errors'=>'Thao tác không thành công']);
       }
       return $this->carService->destroy($id,$_GET['status']);
   }

}
