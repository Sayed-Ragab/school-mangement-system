<?php

namespace App\Http\Controllers\Grades;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use Illuminate\Http\Request;

class GradesController extends Controller
{

    public function index()
    {
        $Grades = Grade::all();
        return view('Dashboard.Grades.index',compact('Grades'));
    }

    public function store(Request $request)
    {
        try {
            $Grade = new Grade();
            $Grade->name = ['en' => $request->name_en, 'ar' => $request->name];
            $Grade->notes = $request->notes;
            $Grade->save();
            session()->flash('add');
            toastr()->success(trans('messages.success'));
            return redirect()->route('Grades.index');
        }catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {
        $Grade = Grade::findorfail($request->id);
        $Grade->update([
            'name'=>['en'=>$request->name_en,'ar'=>$request->name],
            'notes'=>$request->notes,
        ]);
        session()->flash('edit');
        toastr()->success(trans('messages.Update'));
        return redirect()->route('Grades.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request ,$id)
    {
        Grade::destroy($request->id);
        toastr()->error(trans('messages.success'));
        return redirect()->route('Grades.index');

    }
}
