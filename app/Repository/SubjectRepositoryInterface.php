<?php


namespace App\Repository;

interface SubjectRepositoryInterface{

    public function index();

    public function create();

    public function store($requet);

    public function edit($id);

    public function update($request);

    public function destroy($request);
}