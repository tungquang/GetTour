<?php
namespace App\Services;

use App\Interfaces\TourServiceInterface;
use Illuminate\Http\Request;
use App\Model\TypeTour;
use App\Model\Tour;
use App\Model\Nations;
use App\Model\Cites;
use Auth;
use Response;
use Illuminate\Support\Facades\Validator;
use App\Traits\StorageFunction;

/**
 *
 */
class TourService implements TourServiceInterface
{
  use StorageFunction;
  public function __construct(Tour $tour,TypeTour $type,Cites $city)
  {
    $this->tour = $tour;
    $this->type = $type;
    $this->city = $city;
  }
  protected function validator($data,$seat)
  {
    return Validator::make($data,$this->rules($seat),$this->messesges());
  }
  protected function rules($seat)
  {
    return [
      'name'       => 'required|string|max:255',
      'content'    => 'required',
      'time_in'    => 'required',
      'time_out'   => 'required',
      'id_province' => 'required|min:0',
      'place'      => 'required|string|max:255',
      'day'        => 'required|max:6',
      'seat'       => 'required|min:2',
      'number_seated' => 'required|min:0|max:'.$seat,
      'unit_price'    => 'required',
      'img'         =>'required',
    ];
  }
  protected function messesges()
  {
    return [
      'name.required'       => 'Yêu cầu điền tên Tour',
      'content.required'    => 'Thiếu nội dung của Tour',
      'time_in.required'    => 'Yêu cầu điền thời gian xuất phát',
      'time_out.required'   => 'Yêu cầu điền thời gian quay về ',
      'id_province.required' => 'Yêu cầu điền thông tin thành phố',
      'place.required'      => 'Yêu cầu điền địa điểm ',
      'day.required'        => 'Yêu cầu điền số ngày đi',
      'seat.required'       => 'Yêu cầu điền số du khách',
      'number_seated.required' => 'Yêu cầu điền số ghê đã đặt',
      'number_seated.max'      => 'Số ghế đặt quá nhiều',
      'unit_price.required'    => 'Yêu cầu điền giá Tour',
      'img.required'                 =>'Thiếu ảnh đại diện Tour',
    ];
  }


  public function index()
  {
      $list = $this->tour->getAll();
      return view('admin.tour.tour-list')
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
    return view('admin.tour.insert-tour')
                ->with([
                  'user' => Auth::user(),
                  'type' => $this->type->all(),
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
    $this->validator($request->all(),$request->seat)->validate();

    $data = [
                  'id_province' => $request->id_province,
                  'id_type'=> $request->id_type,
                  'name'=> $request->name,
                  'time_in'=> $request->time_in,
                  'time_out'=> $request->time_out,
                  'place'=> $request->place,
                  'day'=> $request->day,
                  'seat'=> $request->seat,
                  'unit_price'=> $request->unit_price,
                  'content'=> $request->content,
                  'img' => $this->getInf($request->img)['name'],
                  'number_seated' => $request->number_seated,
                  'note' => $request->note,
                  'promotion_price' => $request->promotion_price,
                ];

    $this->putFile('public',$request->img);
    $this->tour->create($data);
    return redirect()->route('tour.index');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
      $tour = $this->tour->getbyIdOrfind($id);
      $city = $this->city->all();
      if($tour)
      {
        return view('admin.tour.update-tour')
                  ->with([
                    'tour'=>$tour,
                    'user'=>Auth::user(),
                    'type' =>TypeTour::all(),
                    'city' => $city,
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

    $tour = $this->tour->getbyIdOrfind($id);
    if(!$tour)
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
      $img = $tour->img;
    }


    $data = [
              'id_province' => $request->id_province,
              'id_type'=> $request->id_type,
              'name'=> $request->name,
              'time_in'=> $request->time_in,
              'time_out'=> $request->time_out,
              'place'=> $request->place,
              'day'=> $request->day,
              'seat'=> $request->seat,
              'unit_price'=> $request->unit_price,
              'content'=> $request->content,
              'img' => $img,
              'number_seated' => $request->number_seated,
              'note' => $request->note,
              'promotion_price' => $request->promotion_price,
    ];

      $this->validator($data,$request->seat)->validate();
      $data['id'] = $id;
      $this->tour->updateOrCreateNew($data);

      return redirect('tour/'.$id);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
      $tour = $this->tour->DeleteOrGet($id,0);
      if ($tour) {
          return response()->json($tour);
      }
      return Response::json(['errors'=>1]);

  }
}
