<?php
namespace App\Interfaces;

/**
 *
 */
interface CommentServiceInterface
{
  public function store($request,$type,$id_post);
  public function getMoreComment($request,$type,$id_post);

}
