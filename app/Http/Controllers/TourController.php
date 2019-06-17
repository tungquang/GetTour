<?php

namespace App\Http\Controllers;

use Response;
use Illuminate\Http\Request;
use App\Interfaces\TourServiceInterface;
use Illuminate\Support\Facades\Validator;


class TourController extends Controller
{

    public function __construct(TourServiceInterface $tourSevice)
    {
        $this->middleware('permission:tour')->except('show');
        $this->middleware('permission:create-tour')->only(['store']);
        $this->middleware('permission:edit-tour')->only(['update','edit']);
        $this->middleware('permission:delete-tour')->only(['destroy']);
        $this->tourSevice = $tourSevice;
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
          'time_in'    => 'required',
          'time_out'   => 'required',
          'id_province' => 'required|min:0',
          'place'      => 'required|string|max:255',
          'day'        => 'required|max:6',
          'seat'       => 'required|min:2',
          'book'       => 'required|min:0',
          'unit_price'    => 'required',
          'description' =>'required',
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
          'book.required' => 'Yêu cầu điền số ghê đã đặt',
          'unit_price.required'    => 'Yêu cầu điền giá Tour',
          'description.required'   => 'Thiếu mô tả cơ bản'
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\tourSevice
     */
    public function index()
    {
        return $this->tourSevice->index();
    }

    /**
     * Show the customẻ is disable
     *
     * @return \Illuminate\Http\tourSevice
     */
    public function indexBan()
    {
        return $this->tourSevice->indexBan();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\tourSevice
     */
    public function create()
    {
        return $this->tourSevice->create();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\tourSevice
     */
    public function store(Request $request)
    {
        $this->validator($request->all())->validate();
        try {
          $this->tourSevice->store($request);
        } catch (\Exception $e) {
          abort('403',$e->getMessage());
        }
        return redirect()->route('tour.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\tourSevice
     */
    public function show($id)
    {
        try {
          return $this->tourSevice->show($id);
        } catch (\Exception $e) {
          abort('403',$e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\tourSevice
     */
    public function edit($id)
    {
      try {
        return $this->tourSevice->edit($id);
      } catch (\Exception $e) {
        abort('403',$e->getMessage());
      }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\tourSevice
     */
    public function update(Request $request, $id)
    {
                $this->validator($request->all())->validate();
        try {
          $this->tourSevice->update($request, $id);
        } catch (\Exception $e) {
          abort('403',$e->getMessage());
        }
        return redirect()->route('tour.edit',['tour'=>$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\tourSevice
     */
     public function destroy($id)
     {
         if(!isset($_GET['status']))
         {
           return tourSevice::json(['errors'=>'Thao tác không thành công']);
         }
         return $this->tourSevice->destroy($id,$_GET['status']);
     }


}
