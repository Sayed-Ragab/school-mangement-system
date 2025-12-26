<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Repository\ReceiptStudentsRepositoryInterface;
use Illuminate\Http\Request;

class ReceiptStudentsController extends Controller
{
    public $recipts;
    public function __construct(ReceiptStudentsRepositoryInterface $recipts)
    {
      $this->recipts = $recipts;  
    }
    public function index()
    {
        return $this->recipts->index();
    }

    
    public function create()
    {
  
    }

   
    public function store(Request $request)
    {
        return $this->recipts->store($request);
    }

  
    public function show($id)
    {
        return $this->recipts->show($id);
    }

    
    public function edit($id)
    {
        return $this->recipts->edit($id);
    }

    
    public function update(Request $request, $id)
    {
        return $this->recipts->update($request);
    }

    
    public function destroy(Request $request)
    {
        return $this->recipts->destroy($request);
    }
}
