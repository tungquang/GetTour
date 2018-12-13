<?php

namespace App\Http\Controllers;


use Response;
use App\Model\Hotel;
use Illuminate\Http\Request;
use App\Interfaces\HotelServiceInterface;
use Illuminate\Support\Facades\Validator;

class HotelController extends Controller
{
    public function __construct(HotelServiceInterface $response,Hotel $hotel)
    {
      $this->middleware('auth')->except(['show']);
      $this->middleware('permission:hotel')->except(['show']);
      $this->middleware('permission:create-hotel')->only(['store']);
      $this->middleware('permission:edit-hotel')->only(['update','edit']);
      $this->middleware('permission:delete-hotel')->only(['destroy']);
      $this->hotel = $hotel;
      $this->response = $response;
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
      $hotel = $this->hotel->getbyIdOrfind($id);

      if(!$hotel)
      {
        return view('errors.notfound');
      }
      $img = $hotel->img;
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
