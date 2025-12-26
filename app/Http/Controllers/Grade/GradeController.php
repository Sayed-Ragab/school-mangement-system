<?php

namespace App\Http\Controllers\Grade;

use App\Models\Grade;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Grades = Grade::all();
        return view('Dashboard.Grades.index',compact('Grades'));
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Grade = new Grade();
        $Grade->Name = ['en' => $request->name_en, 'ar' => $request->name_ar];
        $Grade->Notes = $request->Notes;
        $Grade->save();
        toastr()->success(trans('messages.success'));
        return redirect()->route('Grades.index');
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
    public function update(Request $request, $id)
    {
        try {

           
            $Grades = Grade::findOrFail($request->id);
            $Grades->update([
              $Grades->Name = ['ar' => $request->name_ar, 'en' => $request->name_en],
              $Grades->Notes = $request->Notes,
            ]);
            toastr()->success(trans('messages.Update'));
            return redirect()->route('Grades.index');
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
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
        $Grades = Grade::findOrFail($request->id)->delete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->route('Grades.index');
    }
}
