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

      return $this->find($id);
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
      return $this->create($data);

    } catch (\Exception $e) {
      return $this->where(['id'=>$data['id']])->update($data);
    }

  }
}
