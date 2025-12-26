<?php

namespace App\Repository;

use App\Models\Grade;
use App\Models\Supject;
use App\Models\Teacher;

class SubjectRepository implements SubjectRepositoryInterface{

    public function index(){
        $subjects = Supject::get();
        return view('Dashboard.Supject.index',compact('subjects'));
    }
    public function create(){
      
        $Grades = Grade::get();
        $teachers = Teacher::get();
        return view('Dashboard.Supject.add',compact('Grades','teachers'));


    }

    public function store($request){
            
        
        try{
                
                $subjects = new Supject();
                $subjects->name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
                $subjects->Grade_id = $request->Grade_id;
                $subjects->class_id = $request->class_id;
                $subjects->teacher_id = $request->teacher_id;
                $subjects->save();
                toastr()->success(trans('messages.success'));
                return redirect()->route('Subject.index');





            }catch(\Exception $e){
                return redirect()->back()->with(['error' => $e->getMessage()]);
            }
    }

    public function edit($id){
        $subject = Supject::findorfail($id);
        $Grades = Grade::all();
        $teachers = Teacher::all();
        return view('Dashboard.Supject.Update',compact('subject','Grades','teachers'));
    }
    public function update($request){

        try{
              $subjects = Supject::findorfail($request->id);
              $subjects->name = ['ar' => $request->Name_ar, 'en' => $request->Name_en];
              $subjects->Grade_id = $request->Grade_id;
              $subjects->class_id = $request->class_id;
              $subjects->teacher_id = $request->teacher_id;
              $subjects->save();
              toastr()->success(trans('messages.Update'));
              return redirect()->route('Subject.index');

        }catch(\Exception $e){
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }

     
      }




   public function destroy($request){

    try {
        Supject::destroy($request->id);
        toastr()->error(trans('messages.Delete'));
        return redirect()->back();
    }

    catch (\Exception $e) {
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }

   }   
}