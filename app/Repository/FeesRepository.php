<?php

namespace App\Repository;

use App\Models\Fee;
use App\Models\Grade;


class FeesRepository implements FeesRepositoryInterface{

    public function index(){
        $fees = Fee::all();
        $Grades = Grade::all();
        return view('Dashboard.Fees.index',compact('Grades','fees'));

    }
    public function create(){
        $Grades = Grade::all();
        return view('Dashboard.Fees.add',compact('Grades'));
    }

 
   public function edit($id){
    $fee = Fee::findorfail($id);
    $Grades = Grade::all();
    return view('Dashboard.Fees.edit',compact('fee','Grades'));
   }

    public function store($request){
        $fees = new Fee();
        $fees->title = ['en' => $request->title_en, 'ar' => $request->title_ar];
        $fees->amount  =$request->amount;
        $fees->Grade_id  =$request->Grade_id;
        $fees->class_id  =$request->class_id;
        $fees->description  =$request->description;
        $fees->year  =$request->year;
        $fees->save();
        toastr()->success(trans('messages.success'));
        return redirect()->route('Fees.create');
    }

    public function update($request){

        $fees = Fee::findorfail($request->id);
        $fees->title = ['en' => $request->title_en, 'ar' => $request->title_ar];
        $fees->amount  =$request->amount;
        $fees->Grade_id  =$request->Grade_id;
        $fees->class_id  =$request->class_id;
        $fees->description  =$request->description;
        $fees->year  =$request->year;
        $fees->save();
        toastr()->success(trans('messages.Update'));
        return redirect()->route('Fees.index');
    }

    
    public function destroy($request){
         Fee::destroy($request->id);
         toastr()->error(trans('messages.Delete'));
         return redirect()->back();


    }
}




