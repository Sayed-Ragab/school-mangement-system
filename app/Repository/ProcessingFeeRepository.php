<?php

namespace App\Repository;

use App\Models\Student;
use App\Models\ProcessingFee;
use App\Models\ReciptStudent;
use App\Models\StudentAccount;
use Illuminate\Support\Facades\DB;
use App\Repository\ProcessingFeeRepositoryInterface;

class ProcessingFeeRepository  implements ProcessingFeeRepositoryInterface{

    public function index(){
        $processingfees = ProcessingFee::all();
        return view('Dashboard.Processing_Fees.index',compact('processingfees'));

    }
    public function show($id){
        $student = Student::findorfail($id);
        return view('Dashboard.Processing_Fees.Add',compact('student'));

    }
    public function edit($id){
        $processingfee = ProcessingFee::findorFail($id);
        return view('Dashboard.Processing_Fees.edit',compact('processingfee'));

    }
    public function store($request){

      DB::beginTransaction();
    try{
        $processingfees = new ProcessingFee();
        $processingfees->date = date('y-m-d');
        $processingfees->student_id = $request->student_id;
        $processingfees->amount = $request->Debit;
        $processingfees->description  = $request->description;
        $processingfees->save();

        $students_accounts = new StudentAccount();
        $students_accounts->date = date('y-m-d');
        $students_accounts->type = 'ProcessingFee';
        $students_accounts->student_id = $request->student_id;
        $students_accounts->processing_id = $processingfees->id;
        $students_accounts->Debit = 0.00;
        $students_accounts->credit = $request->Debit;
        $students_accounts->description = $request->description;
        $students_accounts->save();
        DB::commit();
        toastr()->success(trans('messages.success'));
        return redirect()->route('ProcessingFee.index');

}catch(\Exception $e){

 DB::rollback();
 return redirect()->back()->withErrors(['error' => $e->getMessage()]);

    }

}

    public function update($request){

        try{

            $processingfees = ProcessingFee::findorfail($request->id);
            $processingfees->date = date('y-m-d');
            $processingfees->student_id = $request->student_id;
            $processingfees->amount = $request->amount;
            $processingfees->description  = $request->description;
            $processingfees->save();

            $students_accounts = StudentAccount::findorfail($request->id);
            $students_accounts->date = date('y-m-d');
            $students_accounts->type = 'ProcessingFee';
            $students_accounts->student_id = $request->student_id;
            $students_accounts->processing_id = $processingfees->id;
            $students_accounts->Debit = 0.00;
            $students_accounts->credit = $request->Debit;
            $students_accounts->description = $request->description;
            $students_accounts->save();

            DB::commit();
            toastr()->success(trans('messages.Update'));
            return redirect()->route('ProcessingFee.index');
        }catch(\Exception $e){
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    public function destroy($request){

        try{
        ProcessingFee::destroy($request->id);
        toastr()->error(trans('messages.Delete'));
        return redirect()->back();
        }catch(\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }
    }

} 
















