<?php
namespace App\Services;


use Auth;
use Response;
use App\Model\Car;
use App\Model\TypeCar;
use App\Traits\StorageFunction;
use App\Interfaces\CarServiceInterface;

 /**
  *
  */
 class CarService implements CarServiceInterface
 {
   use StorageFunction;
   public function __construct(Car $car,TypeCar $type)
   {
     $this->car = $car;
     $this->type = $type;
   }


   public function index()
   {
     $list = $this->car->getAll();
     return view('admin.car.car-list')
                  ->with([
                    'list'=>$list,
                    'user'=>Auth::user(),
                  ]);
   }
   public function store($request)
   {

     $data = [
             'id_type'=> $request->id_type,
             'name'=> $request->name,
             'content'=> $request->content,
             'soghe'=> $request->soghe,
             'unit_price'=> $request->unit_price,
             'book'=> $request->book,
             'img' => $this->getInf($request->img)['name'],
             'note' => $request->note,
         ];
     try {

       $this->car->create($data);

     } catch (\Exception $e) {

       return view('errors.notfound');
     }

     $this->putFile('public',$request->img);

     return redirect()->route('car.index');

   }
   public function create()
   {
       return view('admin.car.insert-car')
                  ->with([
                    'user' => Auth::user(),
                    'type' => $this->type->all(),
                  ]);
   }
   public function edit($id)
   {
     return ' hello ';
   }
   public function show($id)
   {
      $car = $this->car->getbyIdOrfind($id);
       return view('admin.car.update-car')
                 ->with([
                   'car'=>$car,
                   'user'=>Auth::user(),
                   'type' =>TypeCar::all(),
                 ]);


   }
   public function update($request,$id)
   {
     $car = $this->car->find($id);
     if(!$car)
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
       $img = $car->img;
     }
     $data = [
       'id_type'=> $request->id_type,
       'name'=> $request->name,
       'content'=> $request->content,
       'soghe'=> $request->soghe,
       'unit_price'=> $request->unit_price,
       'book'=> $request->book,
       'img' => $img,
       'note' => $request->note,
     ];
       $data['id'] = $id;
       $this->car->updateOrCreateNew($data);

       return redirect('car/'.$id);
   }
   public function destroy($id)
   {
     $car = $this->car->DeleteOrGet($id,0);
     if ($car) {
         return response()->json($car);
     }
     return Response::json(['errors'=>1]);
   }


 }
