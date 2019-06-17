<?php
namespace App\Traits;
use Illuminate\Support\Facades\DB;

/**
 *
 */
trait ActionModel
{

  protected $object;

  public function checkExists($data)
  {
    return $this->where($data)->first();
  }
  public function getAll($limit = 0)
  {
    if(!$limit)
    {
      return $this->where(['status' => 1])->get();
    }
    return $this->where(['status'=>1])
                         ->orderBy('id','desc')
                         ->limit($limit)
                         ->get();

  }
  public function getbyIdOrfind($id = '',array $data=[])
  {
      if ($id !== '') {
        $data = [
          'id'     => $id,
          'status' => 1,
        ];
      }
      return $this->where($data)->first();
  }

  public function DeleteOrGet($id,$status)
  {

    try {
        if($this->find($id))
        {
          $customer = $this->where('id',$id)->update(['status'=>$status]);
          return $id;
        }
    } catch (\Exception $e) {
      return false;
    }

  }

  public function updateOrCreateNew($data)
  {
    try {
        return $this->create($data);
    } catch (\Exception $e) {
      return $this->where(['id'=>$data['id']])->first()->update($data);
    }
  }

  public function getBan()
  {
    return $this->where('status',0)->get();
  }
  /*
  * Method to return a table has attributes as solong,book,type
  */
  public function getInBookTable()
  {
    // danhsachbook make by create view danhsachbook

    $listLast = DB::table('danhsachbook')->select(
       DB::raw('count(book) as solong') ,'book','type'
    )
    ->groupBy('book','type');
    return $listLast;
  }

  public function convertToObject()
  {
    try {
      if (!$this->getbyIdOrfind($this->object)) {
        throw new \Exception("Error Processing Request", 1);
      }
      else {
        return $this->getbyIdOrfind($this->object);
      }
      return $object;
    } catch (\Exception $e) {
      return new self;
    }

  }

}
