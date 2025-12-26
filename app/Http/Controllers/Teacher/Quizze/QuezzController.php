<?php

namespace App\Http\Controllers\Teacher\Quizze;

use App\Models\Grade;
use App\Models\Quizze;
use App\Models\Supject;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Degree;
use Illuminate\Support\Facades\Auth;

class QuezzController extends Controller
{
   
    public function index()
    {
        $quizzes =Quizze::where('teacher_id',Auth()->user()->id)->get();
        return view('Dashboard.Teachers.dashboard.quizee.index',compact('quizzes'));
    }

   
    public function create()
    {
        $subjects = Supject::where('teacher_id',Auth()->user()->id)->get();
        $Grades = Grade::all();
        return view('Dashboard.Teachers.dashboard.quizee.create',compact('subjects','Grades'));
    }

    
    public function store(Request $request)
    {
        try{

            $quizzes = new Quizze();
            $quizzes->name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $quizzes->supject_id = $request->supject_id;
            $quizzes->Grade_id = $request->Grade_id;
            $quizzes->class_id = $request->class_id;
            $quizzes->section_id = $request->section_id;
            $quizzes->teacher_id = auth()->user()->id;
            $quizzes->save();
            toastr()->success(trans('messages.success'));
            return redirect()->route('quizze.index');

        }catch(\Exception $e){
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
        $questions = Question::where('quizze_id',$id)->get();
        $quizze =Quizze::findorfail($id);
        return view('Dashboard.Teachers.dashboard.Questions.index',compact('questions','quizze'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $quizze =Quizze::findorfail($id);
        $subjects = Supject::where('teacher_id',Auth()->user()->id)->get();
        $Grades = Grade::all();
        return view('Dashboard.Teachers.dashboard.quizee.edit',compact('quizze','subjects','Grades'));
    
    }

    
    public function update(Request $request, $id)
    {
        try{

            $quizze =Quizze::findorfail($request->id);
            $quizze->name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $quizze->supject_id = $request->supject_id;
            $quizze->Grade_id = $request->Grade_id;
            $quizze->class_id = $request->class_id;
            $quizze->section_id = $request->section_id;
            $quizze->teacher_id = auth()->user()->id;
            $quizze->save();
            toastr()->success(trans('messages.Update'));
            return redirect()->route('quizze.index');

        }catch(\Exception $e){
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Quizze::destroy($id);
            toastr()->error(trans('messages.Delete'));
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function student_quizze($quizze_id){
        $degrees = Degree::where('quizze_id',$quizze_id)->get();
        return view('Dashboard.Teachers.dashboard.quizee.student_quizze',compact('degrees'));
    }
    public function repeat_quizze(Request $request)
    {
        Degree::where('student_id', $request->student_id)->where('quizze_id', $request->quizze_id)->delete();
        toastr()->success('تم فتح الاختبار مرة اخرى للطالب');
        return redirect()->back();
    }
}
