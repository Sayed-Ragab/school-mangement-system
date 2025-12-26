<?php

namespace App\Http\Controllers\Section;

use App\Models\Grade;
use App\Models\section;
use App\Models\Teacher;
use App\Models\ClassRoom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Grades = Grade::with(['Sections'])->get();
        $list_Grades = Grade::all();
        $teachers = Teacher::all();
        return view('Dashboard.Section.index', compact('Grades', 'list_Grades','teachers'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        
        
        try{
            $section = new Section();
            $section->Name =['ar'=>$request->name_ar,'en'=>$request->name_en];
            $section->Grade_id = $request->Grade_id;
            $section->class_id = $request->class_id;
            $section->status = 1;
            $section->save();
            $section->teachers()->attach($request->teacher_id);
            toastr()->success(__('messages.success'));
            return redirect()->route('Sections.index');
        }catch (\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
            
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $section =  Section::findorFail($request->id);
        $section->Name =['ar'=>$request->name_ar,'en'=>$request->name_en];
        $section->Grade_id = $request->Grade_id;
        $section->class_id = $request->class_id;
        if(isset($request->status)){
            $section->status = 1;
        }else{
            $section->status =2 ;
        }


        if(isset($request->teacher_id)){
            $section->teachers()->sync($request->teacher_id);
        }else{
            $section->teachers()->sync(array());
        }

        $section->save();
        session()->flash('edit');
        toastr()->success(__('messages.Update'));
        return redirect()->route('Sections.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Section::findOrFail($request->id)->delete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->route('Sections.index');
    }
    public function getclasses($id){
        $list_classes = ClassRoom::where('Grade_id', $id)->pluck("Name", "id");
        return $list_classes;
    }
}
