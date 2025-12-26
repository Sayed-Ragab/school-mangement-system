<?php

namespace App\Http\Controllers\Students;

use App\Models\Grade;
use Illuminate\Http\Request;
use App\Models\online_classe;
use App\Http\Controllers\Controller;
use App\Http\Traits\MeetingZoomTrait;
use MacsiDigital\Zoom\Facades\Zoom;
class OnlineClasseController extends Controller
{
    
    use MeetingZoomTrait;

    public function index()
    {
        $online_classes = online_classe::all();
        return view('Dashboard.online_classes.index',compact('online_classes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Grades = Grade::all();
        return view('Dashboard.online_classes.Add',compact('Grades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $meeting = $this->creatmetting($request);
        online_classe::create([
            'Grade_id' => $request->Grade_id,
            'class_id' => $request->class_id,
            'section_id' => $request->section_id,
            'user_id' => auth()->user()->id,
            'meeting_id' => $meeting->id,
            'topic' =>  $meeting->topic,
            'start_at' => $request->start_time,
            'duration' =>  $meeting->duration,
            'password' =>  $meeting->password,
            'start_url' => $meeting->start_url,
            'join_url' =>  $meeting->join_url,
        ]);
        toastr()->success(trans('messages.success'));
        return redirect()->route('online_classes.index');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
