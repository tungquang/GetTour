<?php
namespace App\Services\Tour;

use App\Model\Tour;
use App\Model\Topic;
use App\Interfaces\TourServiceInterface;
use App\Services\Tour\Base\BaseAccessTourService;
/**
 *
 */
class TourService extends BaseAccessTourService implements TourServiceInterface
{

  public function __construct(Tour $tour, Topic $topic)
  {
      $this->tour = $tour;
      $this->topic = $topic;
  }
  public function index()
  {
      $list = $this->tour->getAll();
      return view('admin.tour.tour-list')->with([
            'user' => $this->user(),
            'list' => $list
      ]);
  }

  /*Method to show all tour was disable
  */
  public function indexBan()
  {

      $tour = $this->tour->getBan();
      return view('admin.tour.tour-trash')->with([
            'list' => $tour,
            'user'    => $this->user(),
      ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      return view('admin.tour.insert-tour')->with([
            'user' => $this->user(),
            'type' => $this->type()->get(),
            'nation' => $this->nations()->get(),
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
      $data = $request->except(['photo','_token']);
      $this->UploadFile($request);
      $data['img'] = $this->img;
      $this->tour->create($data);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
      $this->checkExit($id);
      return view('page.tour-detail')->with([
          'tour'     => $this->object,
          'cites'    => $this->cites()->get(),
          'typetour' => $this->type()->get(),
          'topics'    => $this->topic->getTopicOnline('tour')
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
      $this->checkExit($id);
      return view('admin.tour.update-tour')->with([
            'tour' => $this->object,
            'user' =>$this->user(),
            'type' =>$this->type()->get(),
            'city' => $this->cites()->get(),
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
      $this->checkExit($id);
      $data = $request->except(['photo','_token','_method']);
      try {
        $this->UploadFile($request);
        $data['img'] = $this->img;
      } catch (\Exception $e) {
        //To continute
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
      $tour = $this->tour->DeleteOrGet($id,$staus);
      if ($tour) {
          return response()->json($tour);
      }
      return Response::json(['errors'=>1]);

  }
}
