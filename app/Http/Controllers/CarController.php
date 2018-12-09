<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\CarServiceInterface;
use Illuminate\Support\Facades\Validator;
use App\Model\Car;
use Response;

class CarController extends Controller
{
  public function __construct(CarServiceInterface $response,Car $car)
  {
    $this->middleware('auth');
    $this->middleware('permission:car');
    $this->middleware('permission:create-car')->only(['store']);
    $this->middleware('permission:edit-car')->only(['update']);
    $this->middleware('permission:delete-car')->only(['destroy']);
    $this->response = $response;
    $this->car = $car;
  }

  protected function validator($data)
  {
    return Validator::make($data,$this->rules(),$this->messesges());
  }

  protected function rules()
  {
    return [
      'name'       => 'required|string|max:255',
      'content'    => 'required',
      'img'      => 'required|string|max:255',
      'soghe'       => 'required|min:2',
      'unit_price'    => 'required',
      'img'         =>'required',
    ];
  }
  protected function messesges()
  {
    return [
      'name.required'       => 'Yêu cầu điền tên Tour',
      'content.required'    => 'Thiếu nội dung của Tour',
      'soghe.required'      => 'Số ghế đặt không phù hợp',
      'soghe.min'      => 'Số ghế đặt không phù hợp',
      'unit_price.required'    => 'Yêu cầu điền giá Tour',
      'img.required'                 =>'Thiếu ảnh đại diện Tour',
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
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      return $this->response->create();
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      $this->validator($request->all())->validate();
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
    $car = $this->car->find($id);
    if($car)
    {
      return $this->response->show($id);
    }
    return view('errors.notfound');
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
      return $this->response->edit($id);
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
    if(!$request->img)
    {
      $img = $this->car->find($id)->img;
    }
    $img = true;
    $data = [
          'id_type'=> $request->id_type,
          'name'=> $request->name,
          'content'=> $request->content,
          'soghe'=> $request->soghe,
          'unit_price'=> $request->unit_price,
          'book'=> $request->book,
          'img' => $img,
          'note' => $request->note,
        ];
      $this->validator($data)->validate();
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
