<?php

namespace App\Http\Controllers\Parent;

use App\Models\Student;
use App\Models\My_Parent;
use App\Models\Fee_invoice;
use Illuminate\Http\Request;
use App\Models\ReciptStudent;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class FeesParentController extends Controller
{
    public function fees(){
        $studentId = Student::where('parent_id',Auth()->user()->id)->pluck('id');
        $Fee_invoices  = Fee_invoice::whereIn('student_id',$studentId)->get();
        return view('Dashboard.parent.Fess.index',compact('Fee_invoices')); 
    }
    public function receiptStudent($id){
        $student = Student::findorFail($id);
        if ($student->parent_id !== auth()->user()->id) {
            toastr()->error('يوجد خطا في كود الطالب');
            return redirect()->route('fees');
        }
        $receipt_students = ReciptStudent::where('student_id',$id)->get();
        if ($receipt_students->isEmpty()) {
            toastr()->error('لا توجد مدفوعات لهذا الطالب');
            return redirect()->route('fees');
        }

        return view('Dashboard.parent.Receipt.index', compact('receipt_students'));


    }
    public function show($id){
 
    }
    public function update(Request $request, $id)
    {
     

    }
}
