<?php
namespace App\Repository;

use App\Models\Grade;
use App\Models\Quizze;
use App\Models\Supject;
use App\Models\Teacher;
use App\Repository\QuizzRepositoryInterface;

class QuizzRepository  implements QuizzRepositoryInterface{

    public function index(){
        $quizzes = Quizze::all();
        return view('Dashboard.Quizze.index',compact('quizzes'));
    }

    public function create(){
        $Grades = Grade::all();
        $supjects = Supject::all();
        $teachers = Teacher::all();
        return view('Dashboard.Quizze.create',compact('Grades','supjects','teachers'));
    }

    public function store($request){


        try {

            $quizzes = new Quizze();
            $quizzes->name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $quizzes->supject_id = $request->supject_id;
            $quizzes->Grade_id = $request->Grade_id;
            $quizzes->class_id = $request->class_id;
            $quizzes->section_id = $request->section_id;
            $quizzes->teacher_id = $request->teacher_id;
            $quizzes->save();
            toastr()->success(trans('messages.success'));
            return redirect()->route('Quizze.create');
        }
        catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }


    }

    public function edit($id){
        $quizze = Quizze::findorfail($id);
        $supjects = Supject::all();
        $teachers = Teacher::all();
        $Grades = Grade::all();
        return view('Dashboard.Quizze.Edit',compact('quizze','supjects','teachers','Grades'));
    }

    public function update($request){

        try{
            $quizze = Quizze::findorfail($request->id);
            $quizze->name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $quizze->supject_id = $request->supject_id;
            $quizze->Grade_id = $request->Grade_id;
            $quizze->class_id = $request->class_id;
            $quizze->section_id = $request->section_id;
            $quizze->teacher_id = $request->teacher_id;
            $quizze->save();
            toastr()->success(trans('messages.success'));
            return redirect()->route('Quizze.index');
        }catch(\Exception $e){
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }

    }

    public function destroy($request){

        try{
            Quizze::destroy($request->id);
            toastr()->error(trans('messages.Delete'));
            return redirect()->back();

        }catch(\Exception $e){
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
        
    }

}




?>