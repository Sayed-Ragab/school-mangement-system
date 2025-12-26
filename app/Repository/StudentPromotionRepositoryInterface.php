<?php


namespace App\Repository;

interface StudentPromotionRepositoryInterface{


    public function start();

    public function store($request);

    public function create();


    public function destroy($request);
}
