<?php
namespace App\Services\Car;


use Auth;
use Response;
use App\Model\Car;
use App\Model\TypeCar;
use App\Services\Car\Base\BaseAccessCarService;
use App\Interfaces\CarServiceInterface;
 /**
  *
  */
 class CarService extends BaseAccessCarService implements CarServiceInterface
 {

   public function __construct(Car $car,TypeCar $type)
   {
       $this->car = $car;
       $this->type = $type;
   }

   /*
   *Method to show all car is active
   */
   public function index()
   {
       $list = $this->car->getAll();

       return view('admin.car.car-list')->with([
             'list'=> $list,
             'user'=> Auth::user(),
        ]);
   }
   /*
   * Method to show all car is disable
   */

   public function indexBan()
   {
       $list = $this->car->getBan();
       return view('admin.car.car-trash')->with([
             'list'=>$list,
             'user'=>Auth::user(),
      ]);
   }

   public function handingAttributes($request)
   {
       $this->UploadFile($request);

       $data = $request->all();

       if($this->img!== '')
       {
           $data['img'] = $this->img;
       }

       $this->car->create($data);
   }

   public function create()
   {
        return view('admin.car.insert-car')->with([
              'user' => Auth::user(),
              'type' => $this->type->all(),
        ]);
   }

   public function edit($id)
   {
       $car = $this->checkExit($id);

       return view('admin.car.update-car')
                   ->with([
                       'car'  => $car,
                       'user' => Auth::user(),
                       'type' => $this->type->all(),
       ]);
   }

   public function show($id)
   {
       $car = $this->checkExit($id);

       return view('page.car-detail')->with([
             'car'     => $car,
             'typecar' => $this->type->all(),
       ]);
   }

   public function update($request,$id)
   {
       $this->checkExit($id);

       $data = $request->except(['_token','_method','photo']);

       try {
          $this->UploadFile($request);
          if($this->img!== '')
          {
              $data['img'] = $this->img;
          }

       } catch (\Exception $e) {

       }

       $this->object->update($data);
   }

   public function destroy($id,$satus)
   {
       $car = $this->car->DeleteOrGet($id,$satus);

       if ($car) {
           return response()->json($car);
       }
       return Response::json(['errors'=>1]);
   }


 }
