<?php

namespace App\Http\Controllers\Parent;

use App\Models\Degree;
use App\Models\Student;
use App\Models\My_Parent;
use App\Models\Attendance;
use App\Models\Fee_invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ParentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::Where('parent_id',Auth()->user()->id)->get();
       return view('Dashboard.parent.children.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = Student::where('parent_id',Auth()->user()->id)->get();
        return view('Dashboard.parent.Attendance.index',compact('students'));
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'from' => 'required|date|date_format:Y-m-d',
            'to' => 'required|date|date_format:Y-m-d|after_or_equal:from'
        ], [
            'to.after_or_equal' => 'تاريخ النهاية لابد ان اكبر من تاريخ البداية او يساويه',
            'from.date_format' => 'صيغة التاريخ يجب ان تكون yyyy-mm-dd',
            'to.date_format' => 'صيغة التاريخ يجب ان تكون yyyy-mm-dd',
        ]);

        $ids= DB::table('teacher_section')->where('teacher_id',auth()->user()->id)->pluck('section_id');
        $students = Student::whereIn('section_id',$ids)->get();
        if ($request->student_id == 0) {

            $Students = Attendance::whereBetween('attendence_date', [$request->from, $request->to])->get();
            return view('pages.parents.Attendance.index', compact('Students', 'students'));
        } else {

            $Students = Attendance::whereBetween('attendence_date', [$request->from, $request->to])
                ->where('student_id', $request->student_id)->get();
            return view('Dashboard.parent.Attendance.index', compact('Students', 'students'));

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
        $student = Student::findorfail($id);
        if($student->parent_id !== Auth()->user()->id){
            toastr()->error('يوجد خطا في كود الطالب');
            return redirect()->route('parent.index');
        }
        $degrees = Degree::where('student_id', $id)->get();
        if($degrees->isEmpty()){
            toastr()->error('لا توجد نتائج لهذا الطالب');
            return redirect()->route('parent.index');
        }
        return view('Dashboard.parent.degree.index', compact('degrees'));

        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      
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
