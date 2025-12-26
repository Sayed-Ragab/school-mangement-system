<?php

namespace App\Repository;

use App\Models\Grade;
use App\Models\promotion;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class StudentPromotionRepository implements StudentPromotionRepositoryInterface{



    public function start()
    {
        $Grades = Grade::all();
        return view('Dashboard.Students.promotion.index',compact('Grades'));
    }
    
    public function store($request)
    {
        DB::beginTransaction();
        try{
        $students =Student::where('Grade_id',$request->Grade_id)->where('class_id',$request->class_id)->where('section_id',$request->section_id)->where('academic_year',$request->academic_year)->get();

        if($students->count() < 1){
            return redirect()->back()->with('error_promotions', __('main_trans.message'));
        }

        
        foreach($students as $student){
            $ids = explode(',',$student->id);
            Student::WhereIn('id',$ids)->update([
                'Grade_id'=>$request->Grade_id_new,
                'class_id'=>$request->Classroom_id_new,
                'section_id'=>$request->section_id_new,
                'academic_year'=>$request->academic_year_new,
            ]);

                 promotion::updateOrCreate([
                'student_id'=>$student->id,
                'from_grade'=>$request->Grade_id,
                'from_Classroom'=>$request->class_id,
                'from_section'=>$request->section_id,
                'to_grade'=>$request->Grade_id_new,
                'to_Classroom'=>$request->Classroom_id_new,
                'to_section'=>$request->section_id_new,
                'academic_year'=>$request->academic_year,
                'academic_year_new'=>$request->academic_year_new,
                
            ]);
        
         }
                 DB::commit();
                 toastr()->success(__('messages.success'));
                 return redirect()->back();
        
            }catch(\Exception $e){
                DB::rollback();
                return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }
    }

    public function create(){
       $promotions =  promotion::all();

       return view('Dashboard.Students.promotion.mangement',compact('promotions'));

    }
    public function destroy($request)
    {
        try{

        DB::beginTransaction();

        if($request->page_id ==1){

            $promotions = Promotion::all();
            foreach($promotions as $promotion){
                $ids = explode(',',$promotion->student_id);
                Student::whereIn('id',$ids)->update([
                    'Grade_id'=>$promotion->from_grade,
                    'class_id'=>$promotion->from_Classroom,
                    'section_id'=>$promotion->from_section,
                    'academic_year'=>$promotion->academic_year,
                ]);

                promotion::truncate();
               
            }
            DB::commit();
            toastr()->error(trans('messages.Delete'));
            return redirect()->back();
        }
        else{
            $promotion = promotion::findorfail($request->id);
            Student::where('id',$promotion->student_id)->update([
                'Grade_id'=>$promotion->from_grade,
                'class_id'=>$promotion->from_Classroom,
                'section_id'=>$promotion->from_section,
                'academic_year'=>$promotion->academic_year,
            ]);
            promotion::destroy($request->id);
            DB::commit();
            toastr()->error(trans('messages.Delete'));
            return redirect()->back();
        }
    }catch(\Exception $e){
        DB::rollBack();
        return redirect()->back()->withErrors(['error' => $e->getMessage()]); 
     }
  }
}