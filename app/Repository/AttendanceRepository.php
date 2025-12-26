<?php

namespace App\Repository;

use App\Models\Attendance;
use App\Models\Grade;
use App\Models\Student;
use App\Models\Teacher;
use Symfony\Component\VarDumper\Cloner\Stub;

class AttendanceRepository implements AttendanceRepositoryInterface{

    public function index(){
        $Grades = Grade::with('Sections')->get();
        $List_Grades = Grade::all();
        $teacher = Teacher::all();
        return view('Dashboard.Attendance.Section',compact('Grades','List_Grades','teacher'));
    }

    public function show($id){
        $students  = Student::with('attendance')->where('section_id',$id)->get();
        return view('Dashboard.Attendance.index',compact('students'));
    }
    public function store($request){
        try{

            foreach($request->attendances as $studentid => $attendance){
                if($attendance == 'presence'){
                    $status = true;
                }else{
                    $status = false;
                }
                Attendance::create([
                    'student_id'=> $studentid,
                    'grade_id'=> $request->Grade_id,
                    'class_id'=> $request->class_id,
                    'section_id'=> $request->section_id,
                    'teacher_id'=> 1,
                    'Date'=> date('Y-m-d'),
                    'status'=> $status

                ]);
            }
            toastr()->success(trans('messages.success'));
            return redirect()->back();


        }catch(\Exception $e){
               return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    }
