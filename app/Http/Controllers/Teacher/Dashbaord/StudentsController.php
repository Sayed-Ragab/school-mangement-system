<?php

namespace App\Http\Controllers\Teacher\Dashbaord;

use App\Models\Section;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Date;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ids= DB::table('teacher_section')->where('teacher_id',auth()->user()->id)->pluck('section_id');
        $students = Student::whereIn('section_id',$ids)->get();
        return view('Dashboard.Teachers.dashboard.students.index',compact('students'));
    }

    public function section(){
        $ids = Teacher::findorfail(Auth()->user()->id)->Sections()->pluck('section_id');
        $sections = Section::whereIn('id',$ids)->get();

        return view('Dashboard.Teachers.dashboard.sections.sections',compact('sections'));

    }
    public function attendance(Request $request){
        try{


        
            $attenddate = date('Y-m-d');
            foreach($request->attendences as $studentid => $attendance){
                if ($attendance == 'presence') {
                    $status = true;
                } else if ($attendance == 'absent') {
                    $status = false;
                }
                Attendance::updateorCreate(['student_id'=> $studentid,
                'Date'=>$attenddate,
                   
            ],
                [
                    'student_id'=> $studentid,
                    'grade_id'=> $request->Grade_id,
                    'class_id'=> $request->class_id,
                    'section_id'=> $request->section_id,
                    'teacher_id'=> 1,
                    'Date'=> $attenddate,
                    'status'=> $status,

                ]);
            }
            toastr()->success(trans('messages.success'));
            return redirect()->back();


        }catch(\Exception $e){
               return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

 public function ReportAttendance(Request $request){

    $ids= DB::table('teacher_section')->where('teacher_id',auth()->user()->id)->pluck('section_id');
    $students = Student::whereIn('section_id',$ids)->get();
    
    return view('Dashboard.Teachers.dashboard.students.attendance_report',compact('students'));
 }

 public function attendanceSearch(Request $request){

    $request->validate([
        'from'  =>'required|date|date_format:Y-m-d',
        'to'=> 'required|date|date_format:Y-m-d|after_or_equal:from'
    ],[
        'to.after_or_equal' => 'تاريخ النهاية لابد ان اكبر من تاريخ البداية او يساويه',
        'from.date_format' => 'صيغة التاريخ يجب ان تكون yyyy-mm-dd',
        'to.date_format' => 'صيغة التاريخ يجب ان تكون yyyy-mm-dd',
    ]);

    $ids= DB::table('teacher_section')->where('teacher_id',auth()->user()->id)->pluck('section_id');
    $students = Student::whereIn('section_id',$ids)->get();

    if($request->student_id == 0){

        $Students = Attendance::whereBetween('Date',[$request->from,$request->to])->get();
        return view('Dashboard.Teachers.dashboard.students.attendance_report',compact('Students','students'));

    }else{

        $Students = Attendance::whereBetween('Date',[$request->from,$request->to])->where('student_id',$request->student_id)->get();

        return view('Dashboard.Teachers.dashboard.students.attendance_report',compact('Students','students'));
    }
 }
}
