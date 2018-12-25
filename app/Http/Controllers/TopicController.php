<?php

namespace App\Http\Controllers;

use Response;
use Illuminate\Http\Request;
use App\Interfaces\TopicServiceInterface;
use Illuminate\Support\Facades\Validator;

class TopicController extends Controller
{
    public function __construct(TopicServiceInterface $topicService)
    {
        $this->middleware('role:own');
        $this->topicService = $topicService;
    }

    protected function validator($data)
    {
        return Validator::make($data,$this->rules(),$this->messesges());
    }

    protected function rules()
    {
        return [
          'content'   => 'required',
          'type'      => 'required',
        ];
    }

    protected function messesges()
    {
        return [
          'content.required' => 'Không để trống nội dung của topic',
          'type.required'    => 'Thiếu Topic'
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\topicService
     */
    public function index()
    {
        return $this->topicService->index();
    }

    /**
     * Show the customẻ is disable
     *
     * @return \Illuminate\Http\topicService
     */
    public function indexBan()
    {
        return $this->topicService->indexBan();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\topicService
     */
    public function create()
    {
        return $this->topicService->create();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\topicService
     */
    public function store(Request $request)
    {
        // $this->validator($request->all())->validate();
        return response()->json($request->type);
        return $this->topicService->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\topicService
     */
    public function show($id)
    {

      $falge = (isset($_GET['type'])) ? (!empty($_GET['type']) ? $_GET['type'] :false ) : false;
      if($falge)
      {
        $data = [
          'id'   => $id,
          'type' => $falge
        ];
        return $this->topicService->show($data);
      }
      return topicService()->json($value = false);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\topicService
     */
    public function edit($id)
    {

        return $this->topicService->edit($id);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\topicService
     */
    public function update(Request $request, $id)
    {
        if($request->content && $id)
        {
          return $this->topicService->update($request, $id);
        }
        return topicService()->json($value = false);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\topicService
     */
     public function destroy($id)
     {
         if(!isset($_GET['status']))
         {
           return topicService::json(['errors'=>'Thao tác không thành công']);
         }
         return $this->topicService->destroy($id,$_GET['status']);
     }

}
