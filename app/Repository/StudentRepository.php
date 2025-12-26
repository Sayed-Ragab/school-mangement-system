<?php
namespace App\Repository;

use App\Models\Grade;
use App\Models\Image;
use App\Models\Gender;
use App\Models\Section;
use App\Models\Student;
use App\Models\ClassRoom;
use App\Models\My_Parent;
use App\Models\blood_type;
use App\Models\Nationalitie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class StudentRepository implements StudentRepositoryInterface
{


    public function Get_Student()
    {
        $Students = Student::all();
        return view('Dashboard.Students.index',compact('Students'));
    }

    public function Edit_Student($id){
        $Grades = Grade::all();
        $Genders = Gender::all();
        $parents = My_Parent::all();
        $nationals = Nationalitie::all();
        $bloods = blood_type::all();
        $Students = Student::findorfail($id);
        return view('Dashboard.Students.Update',compact('Students','Grades','Genders','parents','nationals','bloods'));
    }


    public function Update_Student($request)
    {
        DB::beginTransaction();
    try{
        $Students =  Student::findorfail($request->id);
        $Students->name = ['ar'=>$request->name_ar,'en'=>$request->name_en];
        $Students->email = $request->email;
        $Students->password = Hash::make($request->password);
        $Students->Birth_Date = $request->Birth_Date;
        $Students->academic_year = $request->academic_year;
        $Students->Gender_id = $request->Gender_id;
        $Students->Grade_id = $request->Grade_id;
        $Students->nationalitie_id = $request->nationalitie_id;
        $Students->blood_id = $request->blood_id;
        $Students->class_id = $request->class_id;
        $Students->section_id = $request->section_id;
        $Students->parent_id = $request->parent_id;
        $Students->save();

        if($request->hasfile('photos')){
            foreach($request->file('photos')as $file){
               $name = $file->getClientOriginalName();
               $file->storeAs('Attachments/Studnets/'.$Students->name,$file->getClientOriginalName(),'upload_attachments');
                $images = new Image();
                $images->filename = $name;
                $images->Image_id = $Students->id;
                $images->Image_type = 'App\models\Student';
                $images->save();
            }   
        }
        DB::commit();
        
        toastr()->success(trans('messages.Update'));
        return redirect()->route('Students.index');
        DB::rollback();
        }catch(\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
}

public function Create_Student()
    {
        $Grades = Grade::all();
        $Genders = Gender::all();
        $parents = My_Parent::all();
        $nationals = Nationalitie::all();
        $bloods = blood_type::all();
        $Students = Student::all();
        return view('Dashboard.Students.add',compact('Students','Grades','Genders','parents','nationals','bloods'));
    }

    public function Show_Student($id)
    {
        $Students = Student::findorfail($id);
        return view('Dashboard.Students.show',compact('Students'));
    }

    public function Store_Student( $request)
    {
        DB::beginTransaction();
        try{
        $Students = new Student();
        $Students->name = ['ar'=>$request->name_ar,'en'=>$request->name_en];
        $Students->email = $request->email;
        $Students->password =Hash::make($request->password);
        $Students->Birth_Date = $request->Birth_Date;
        $Students->academic_year = $request->academic_year;
        $Students->Gender_id = $request->Gender_id;
        $Students->Grade_id = $request->Grade_id;
        $Students->nationalitie_id = $request->nationalitie_id;
        $Students->blood_id = $request->blood_id;
        $Students->class_id = $request->class_id;
        $Students->section_id = $request->section_id;
        $Students->parent_id = $request->parent_id;
        $Students->save();
        if($request->hasfile('photos')){
            foreach($request->file('photos')as $file){
               $name = $file->getClientOriginalName();
               $file->storeAs('Attachments/Studnets/'.$Students->name,$file->getClientOriginalName(),'upload_attachments');
                $images = new Image();
                $images->filename = $name;
                $images->Image_id = $Students->id;
                $images->Image_type = 'App\models\Student';
                $images->save();


            }

        }
        DB::commit();
        toastr()->success(trans('messages.success'));
        return redirect()->route('Students.index');
        }catch(\Exception $e){
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function Get_classrooms($id){

        $list_classes = ClassRoom::where("Grade_id", $id)->pluck("Name", "id");
        return $list_classes;

    }
    


    public function Get_Sections($id){

        $list_sections = Section::where("class_id", $id)->pluck("Name", "id");
        return $list_sections;
    }

    public function Upload_attachment($request)
    {
        foreach($request->file('photos') as $file)
        {
            $name = $file->getClientOriginalName();
            $file->storeAs('attachments/students/'.$request->student_name, $file->getClientOriginalName(),'upload_attachments');

            // insert in image_table
            $images= new image();
            $images->filename=$name;
            $images->Image_id = $request->student_id;
            $images->Image_type = 'App\Models\Student';
            $images->save();
        }
        toastr()->success(trans('messages.success'));
        return redirect()->back();
    }


    public function Download_attachment($studentsname, $filename)
    {
        return response()->download(public_path('attachments/students/'.$studentsname.'/'.$filename));
    }

    public function Delete_attachment($request)
    {
        // Delete img in server disk
        Storage::disk('upload_attachments')->delete('attachments/students/'.$request->student_name.'/'.$request->filename);

        // Delete in data
        image::where('id',$request->id)->where('filename',$request->filename)->delete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->back();
    }

    public function Delete_Student($request)
    {
        Student::destroy($request->id);
        toastr()->error(trans('messages.Delete'));
        return redirect()->route('Students.index');
    

}
}