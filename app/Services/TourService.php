<?php
namespace App\Services;

use Auth;
use Response;
use App\Model\TypeTour;
use App\Model\Tour;
use App\Model\Nations;
use App\Model\Cites;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Interfaces\TourServiceInterface;
use App\Traits\StorageFunction;

/**
 *
 */
class TourService implements TourServiceInterface
{
  use StorageFunction;
  public function __construct(Tour $tour,TypeTour $type)
  {
    $this->tour = $tour;
    $this->type = $type;
  }

  public function index()
  {
      $list = $this->tour->getAll();
      // dd($list);
      return view('admin.tour.tour-list')
                  ->with([
                    'user' => Auth::user(),
                    'list' => $list
                  ]);
  }

  /*Method to show all tour was disable
  */
  public function indexBan()
  {

    $tour = $this->tour->getBan();

    return view('admin.tour.tour-trash')
                 ->with(
                   [
                     'list' => $tour,
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
                  'book' => $request->number_seated,
                  'note' => $request->note,
                  'promotion_price' => $request->promotion_price,
                  'description' => $request->description
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
    if($tour)
    {
      return view('page.tour-detail')
            ->with([
                'tour' => $tour,
                'cites' => Cites::all(),
                'typetour' => TypeTour::all()
        ]);
    }
    abort('404','Not found ');

  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $tour = $this->tour->getbyIdOrfind($id);
    if($tour)
    {
      return view('admin.tour.update-tour')
                ->with([
                  'tour'=>$tour,
                  'user'=>Auth::user(),
                  'type' =>TypeTour::all(),
                  'city' => Cites::all(),
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
    $tour = $this->tour->getbyIdOrfind($id);

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
              'book' => $request->number_seated,
              'note' => $request->note,
              'promotion_price' => $request->promotion_price,
              'description' => $request->description,
    ];
      $data['id'] = $id;

      $flag = $this->tour->updateOrCreateNew($data);
      if($flag)
      {
          return redirect()->route('tour.edit',['tour'=>$id]);
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
      $tour = $this->tour->DeleteOrGet($id,$staus);
      if ($tour) {
          return response()->json($tour);
      }
      return Response::json(['errors'=>1]);

  }
}
