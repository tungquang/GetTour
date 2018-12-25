<?php
namespace App\Services\Hotel;

use Response;
use App\Model\Hotel;
use Illuminate\Http\Request;
use App\Interfaces\HotelServiceInterface;
use App\Services\Hotel\Base\BaseAccessHotelService;
/**
 *
 */
class HotelService extends BaseAccessHotelService implements HotelServiceInterface
{

  public function __construct(Hotel $hotel)
  {
    $this->hotel = $hotel;
  }
  public function index()
  {
      $list = $this->hotel->getAll();
      return view('admin.hotel.hotel-list')->with([
            'user' => $this->user(),
            'list' => $list
      ]);
  }

  /*Method to show all hotel was disable
  */
  public function indexBan()
  {
      $hotel = $this->hotel->getBan();
      return view('admin.hotel.hotel-trash')->with([
            'list' => $hotel,
            'user' => $this->user(),
      ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      return view('admin.hotel.insert-hotel')->with([
            'user'   => $this->user(),
            'nation' => $this->nations()->all(),
            'stars'   => $this->star()->get()
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
      $data = $request->except(['_token','nation','photo']);
      $this->UploadFile($request);

      if($this->img !== '')
      {
        $data['img'] = $this->img;
      }

      $this->hotel->create($data);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $this->checkExits($id);
    return view('page.hotel-detail')->with([
          'hotel' => $this->object,
          'cites' => $this->cites()->get(),
          'star'  => $this->star()->get()
        ]);
  }


  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $this->checkExits($id);
    return view('admin.hotel.update-hotel')->with([
          'hotel' => $this->object,
          'user'  => $this->user(),
          'city'  => $this->cites()->get(),
          'nation'=> $this->nations()->get(),
          'star'  => $this->star()->get(),
    ]);

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
      $this->checkExits($id);
      $data = $request->except(['_method','_token','photo']);

      if($request->photo)
      {
          try {
              $this->UploadFile($request);
          } catch (\Exception $e) {
            //if has exception , don't has action
          }
          if ($this->img !== '') {
              $data['img'] = $this->img;
          }
      }

      $this->object->update($data);

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
