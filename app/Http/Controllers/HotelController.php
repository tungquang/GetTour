<?php

namespace App\Http\Controllers;


use Response;
use Illuminate\Http\Request;
use App\Interfaces\HotelServiceInterface;
use Illuminate\Support\Facades\Validator;

class HotelController extends Controller
{
    public function __construct(HotelServiceInterface $hotelService)
    {
      $this->middleware('auth')->except(['show']);
      $this->middleware('permission:hotel')->except(['show']);
      $this->middleware('permission:create-hotel')->only(['store']);
      $this->middleware('permission:edit-hotel')->only(['update','edit']);
      $this->middleware('permission:delete-hotel')->only(['destroy']);
      $this->hotelService = $hotelService;
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
        'description' =>'required',
      ];
    }
    protected function messesges()
    {
      return [
        'name.required'       => 'Yêu cầu điền tên Hotel',
        'content.required'    => 'Thiếu nội dung của Hotel',
        'star.required'       => 'Yêu cầu chọn kiểu khách sạn đang có',
        'star.min'            => 'Kiểu khách sạn không hợp lệ',
        'star.max'            => 'Kiểu khách sạn không hợp lệ',
        'room.required'       => 'Số phòng không hợp lệ!',
        'room.min'            => 'Số phòng không hợp lệ!',
        'unit_price.required' => 'Yêu cầu điền giá Hotel',
        'description.required'   => 'Thiếu mô tả cơ bản'
      ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\hotelService
     */
    public function index()
    {
        return $this->hotelService->index();
    }


     /**
      * Show the customẻ is disable
      *
      * @return \Illuminate\Http\hotelService
      */
     public function indexBan()
     {
         return $this->hotelService->indexBan();
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\hotelService
     */


    public function create()
    {
        return $this->hotelService->create();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\hotelService
     */
    public function store(Request $request)
    {
        $this->validator($request->all())->validate();
        try {
          $this->hotelService->store($request);
        } catch (\Exception $e) {
          abort('404',$e->getMessage());
        }
        return redirect()->route('hotel.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\hotelService
     */
    public function show($id)
    {
        
        try {
          return $this->hotelService->show($id);
        } catch (\Exception $e) {
          abort('404',$e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\hotelService
     */
    public function edit($id)
    {
        return $this->hotelService->edit($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\hotelService
     */
    public function update(Request $request, $id)
    {
        $this->validator($request->all())->validate();
        try {
          $this->hotelService->update($request, $id);
        } catch (\Exception $e) {
          abort('404','Method not allow');
        }
        return redirect()->route('hotel.edit',['tour'=>$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\hotelService
     */
     public function destroy($id)
     {
         if(!isset($_GET['status']))
         {
           return hotelService::json(['errors'=>'Thao tác không thành công']);
         }
         return $this->hotelService->destroy($id,$_GET['status']);
     }


}
