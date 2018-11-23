<?php
namespace App\Traits;
/**
 *
 */
trait ActionModel
{
  public function checkExists($data)
  {
    return $this->where($data)
                ->first();
  }
  public function getAll()
  {
    return $this->where(['status' => 1])->get();
  }
  public function getbyIdOrfind($id = '',array $data=[])
  {
    if ($id == '') {
      return $this->where($data)->get();
    }
    else {
      $dataCheck = [
        'id'     => $id,
        'status' => 1,
      ];

      $obj = $this->checkExists($dataCheck);
      return $obj;
    }
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
      if(!$this->find($id))
      {
        return $this->create($data);
      }

    } catch (\Exception $e) {
      

      return $this->where(['id'=>$data['id']])->update($data);
    }

  }
}
