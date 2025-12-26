<?php

namespace App\Http\Controllers\Teacher;

use App\Models\Gender;
use App\Models\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Specialization;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    
   
    public function index()
    {
      $Teachers =  Teacher::all();
      $Genders = Gender::all();
      $specializations = Specialization::all();
      return view('Dashboard.Teachers.Teacher',compact('Teachers','Genders','specializations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {                      
        $Teachers =  Teacher::all();
      $Genders = Gender::all();
      $specializations = Specialization::all();
      return view('Dashboard.Teachers.create',compact('Teachers','Genders','specializations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $Teachers = new Teacher();
            $Teachers->email = $request->email;
            $Teachers->password =  Hash::make($request->password);
            $Teachers->name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $Teachers->specialization_id = $request->specialization_id;
            $Teachers->Gender_id = $request->Gender_id;
            $Teachers->Joining_Date = $request->Joining_Date;
            $Teachers->address = $request->address;
            $Teachers->save();
            toastr()->success(trans('messages.success'));
            return redirect()->route('Teachers.create');
        }
        catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
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
        $Teachers = Teacher::findOrFail($id);
        $genders = Gender::all();
        $specializations = Specialization::all();
        return view('Dashboard.Teachers.Edit',compact('Teachers','genders','specializations'));
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
        try{
        $Teachers = Teacher::findOrFail($request->id);
        $Teachers->email = $request->email;
        $Teachers->password =  Hash::make($request->password);
        $Teachers->name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
        $Teachers->specialization_id = $request->specialization_id;
        $Teachers->Gender_id = $request->Gender_id;
        $Teachers->Joining_Date = $request->Joining_Date;
        $Teachers->address = $request->address;
        $Teachers->save();
        toastr()->success(trans('messages.Update'));
        return redirect()->route('Teachers.index');
    }
    catch (\Exception $e) {
        return redirect()->back()->with(['error' => $e->getMessage()]);
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Teacher::findOrFail($request->id)->delete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->route('Teachers.index');
    }
}
