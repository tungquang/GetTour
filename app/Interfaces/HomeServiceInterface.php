<?php


namespace App\Interfaces;


interface HomeServiceInterface
{
    public function index();

    public function hotel();

    public function tour();

    public function car();

    public function comment($request,$type ,$id_post);

    public function getMoreComment($request, $type, $id_post);

}