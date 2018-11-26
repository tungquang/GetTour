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
