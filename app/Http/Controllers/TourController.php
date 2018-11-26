<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Tour;
use App\Interfaces\TourServiceInterface;
use Illuminate\Support\Facades\Validator;


class TourController extends Controller
{

    public function __construct(TourServiceInterface $response,Tour $tour)
    {
      $this->middleware('auth');
      $this->response = $response;
      $this->tour = $tour;
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
      $img = true;
      $tour = $this->tour->getbyIdOrfind($id);
      if(!$tour)
      {
        return view('errors.notfound');
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
        return $this->response->destroy($id);
    }
}
