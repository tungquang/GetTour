<?php
namespace App\Services;

use App\Interfaces\HotelServiceInterface;
use Illuminate\Http\Request;
use App\Model\Hotel;
use App\Model\Nations;
use App\Model\Cites;
use App\Model\Star;
use Auth;
use Response;
use Illuminate\Support\Facades\Validator;
use App\Traits\StorageFunction;

/**
 *
 */
class HotelService implements HotelServiceInterface
{
  use StorageFunction;
  public function __construct(Hotel $hotel,Nations $nation,Cites $city)
  {
    $this->hotel = $hotel;
    $this->nation = $nation;
    $this->city = $city;

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
      'id_province' => 'required|min:0',
      'star'      => 'required|integer|min:1|max:6',
      'room'      => 'required |min:1',
      'unit_price'    => 'required',
      'img'         =>'required',
    ];
  }
  protected function messesges()
  {
    return [
      'name.required'       => 'Yêu cầu điền tên Hotel',
      'content.required'    => 'Thiếu nội dung của Hotel',
      'star.required'       => 'Yêu cầu chọn kiểu khách sạn đang có',
      'star.min'       => 'Kiểu khách sạn không hợp lệ',
      'star.max'       => 'Kiểu khách sạn không hợp lệ',
      'room.required'       => 'Số phòng không hợp lệ!',
      'room.min'            => 'Số phòng không hợp lệ!',
      'unit_price.required' => 'Yêu cầu điền giá Hotel',
      'img.required'        =>'Thiếu ảnh đại diện Hotel',
    ];
  }


  public function index()
  {
      $list = $this->hotel->getAll();
      return view('admin.hotel.hotel-list')
                  ->with([
                    'user'=>Auth::user(),
                    'list' => $list
                  ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('admin.hotel.insert-hotel')
              ->with([
                'user' => Auth::user(),
                'nation' => Nations::all(),
              ]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store($request)
  {

    $this->validator($request->all())->validate();
    $data = [
                  'id_province' => $request->id_province,
                  'star'=> $request->star,
                  'name'=> $request->name,
                  'unit_price'=> $request->unit_price,
                  'content'=> $request->content,
                  'img' => $this->getInf($request->img)['name'],
                  'room' => $request->room,
                  'note' => $request->note,
                  'promotion_price' => $request->promotion_price,
                ];
    $this->putFile('public',$request->img);
    $this->hotel->create($data);
    return redirect()->route('hotel.index');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
      $hotel = $this->hotel->getbyIdOrfind($id);
      $city = $this->city->all();
      if($hotel)
      {
        return view('admin.hotel.update-hotel')
                  ->with([
                    'hotel'=>$hotel,
                    'user'=>Auth::user(),
                    'city'=>$city,
                    'nation'=>Nations::all(),
                    'star' => Star::all(),
                  ]);
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
      return 'hello';
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update($request, $id)
  {

    $hotel = $this->hotel->getbyIdOrfind($id);

    if(!$hotel)
    {
      return view('errors.notfound');
    }

    if($request->img)
    {

      $img = $this->getInf($request->img)['name'];
      $this->putFile('public',$request->img);
    }
    else
    {
      $img = $hotel->img;
    }


    $data = [
      'id_province' => $request->id_province,
      'star'=> $request->star,
      'name'=> $request->name,
      'unit_price'=> $request->unit_price,
      'content'=> $request->content,
      'img' => $img,
      'room' => $request->room,
      'note' => $request->note,
      'promotion_price' => $request->promotion_price,
    ];

      $this->validator($data)->validate();
      $data['id'] = $id;

      $this->hotel->updateOrCreateNew($data);

      return redirect('hotel/'.$id);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
      $hotel = $this->hotel->DeleteOrGet($id,0);
      if ($hotel) {
          return response()->json($hotel);
      }
      return Response::json(['errors'=>1]);

  }
}
