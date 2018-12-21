<?php
namespace App\Services;


use Auth;
use Response;
use App\Model\Hotel;
use App\Model\Nations;
use App\Model\Cites;
use App\Model\Star;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Interfaces\HotelServiceInterface;
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


  public function index()
  {
      $list = $this->hotel->getAll();
      return view('admin.hotel.hotel-list')
                  ->with([
                    'user'=>Auth::user(),
                    'list' => $list
                  ]);
  }

  /*Method to show all hotel was disable
  */
  public function indexBan()
  {

    $hotel = $this->hotel->getBan();

    return view('admin.hotel.hotel-trash')
                 ->with(
                   [
                     'list' => $hotel,
                     'user'    => Auth::user(),
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
                  'description' => $request->description,
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
      if($hotel)
      {
        return view('page.hotel-detail')
              ->with([
                'hotel' =>$hotel,
                'cites' => Cites::all(),
                'star'  => Star::all()
        ]);
      }
      abort('404','Not found');

  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
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
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update($request, $id)
  {
    $hotel = $this->hotel->getbyIdOrfind($id);
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
      'description' => $request->description
    ];
      $data['id'] = $id;

      $flag = $this->hotel->updateOrCreateNew($data);
      if($flag)
      {
          return redirect()->route('hotel.edit',['tour'=>$id]);
      }
      abort('403','Can do that');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id,$staus)
  {
      $hotel = $this->hotel->DeleteOrGet($id,$staus);
      if ($hotel) {
          return response()->json($hotel);
      }
      return Response::json(['errors'=>1]);

  }
}
