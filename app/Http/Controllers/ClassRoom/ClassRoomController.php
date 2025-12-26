<?php

namespace App\Http\Controllers\ClassRoom;

use App\Http\Controllers\Controller;
use App\Models\ClassRoom;
use App\Models\Grade;
use Illuminate\Http\Request;

class ClassRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Classes = ClassRoom::all();
        $Grades = Grade::all();
        return view('Dashboard.classroom.index', compact('Classes', 'Grades'));
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
        $List_Classes = $request->List_Classes;

        try {


            foreach ($List_Classes as $List_Class) {

                $Classes = new ClassRoom();

                $Classes->Name = ['en' => $List_Class['name_en'], 'ar' => $List_Class['name']];

                $Classes->Grade_id = $List_Class['Grade_id'];

                $Classes->save();

            }
            
            toastr()->success(trans('messages.success'));
            return redirect()->route('Classrooms.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }


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
        try{
            $Classes = ClassRoom::findOrFail($request->id);

            $Classes->update([

                $Classes->name = ['ar' => $request->name, 'en' => $request->name_en],
                $Classes->Grade_id = $request->Grade_id,
            ]);
            toastr()->success(trans('messages.Update'));
            return redirect()->route('Classrooms.index');


        }catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function destroy(Request $request,$id)
    {
        ClassRoom::findOrFail($request->id)->delete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->route('Classrooms.index');
    }
    public function delete_all(Request $request)
    {
        $delete_all_id = explode(",", $request->delete_all_id);

        ClassRoom::whereIn('id', $delete_all_id)->Delete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->route('Classrooms.index');
    }
    public function Filter_Classes(Request $request)
    {
        $Grades = Grade::all();
        $Search = ClassRoom::select('*')->where('Grade_id','=',$request->Grade_id)->get();
        return view('Dashboard.ClassRoom.index',compact('Grades'))->withDetails($Search);

    }
}
