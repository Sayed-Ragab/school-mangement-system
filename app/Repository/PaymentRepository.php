<?php



namespace App\Repository;

use App\Models\Payment;
use App\Models\Student;
use App\Models\FundAccount;
use App\Models\StudentAccount;
use Illuminate\Support\Facades\DB;

class PaymentRepository implements PaymentRepositoryInterface{
    public function index()
    {
        $payments  = Payment::all();
        return view('Dashboard.payment.index',compact('payments'));
    }
    public function show($id)
    {
        $student = Student::findorfail($id);
        return view('Dashboard.payment.add',compact('student'));
    }
    public function edit($id)
    {
        $payments  = Payment::findorfail($id);
        return view('Dashboard.payment.edit',compact('payments'));
    }
    public function store($request)
   {

        DB::beginTransaction();
        try{
        $payments = new Payment();
        $payments->date = date('y-m-d');
        $payments->student_id = $request->student_id;
        $payments->amount = $request->Debit;
        $payments->description = $request->description;
        $payments->save();


        $fundAccount = new FundAccount();
        $fundAccount->date = date('y-m-d');
        $fundAccount->payment_id = $payments->id;
        $fundAccount->Debit = 0.00;
        $fundAccount->credit = $request->Debit;
        $fundAccount->description = $request->description;
        $fundAccount->save();

        $student_account = new StudentAccount();
        $student_account->date = date('y-m-d');
        $student_account->type = "payment";
        $student_account->student_id = $request->student_id;
        $student_account->payment_id = $payments->id;
        $student_account->Debit = $request->Debit;
        $student_account->credit =0.00;
        $student_account->description = $request->description;
        $student_account->save();
        DB::commit();
        toastr()->success(trans('messages.success'));
        return redirect()->route('Pyment_Students.index');   
        }catch(\Exception $e){
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

        






   }

   public function update($request)
   {
        try{

            $payments =  Payment::findorfail($request->id);
            $payments->date = date('y-m-d');
            $payments->student_id = $request->student_id;
            $payments->amount = $request->Debit;
            $payments->description = $request->description;
            $payments->save();

            $fundAccount =  FundAccount::where('payment_id',$request->id)->first();
            $fundAccount->date = date('y-m-d');
            $fundAccount->payment_id = $payments->id;
            $fundAccount->Debit = 0.00;
            $fundAccount->credit = $request->Debit;
            $fundAccount->description = $request->description;
            $fundAccount->save();   

        $student_account =  StudentAccount::where('payment_id',$request->id)->first();
        $student_account->date = date('y-m-d');
        $student_account->type = "payment";
        $student_account->student_id = $request->student_id;
        $student_account->payment_id = $payments->id;
        $student_account->Debit = $request->Debit;
        $student_account->credit =0.00;
        $student_account->description = $request->description;
        $student_account->save();

        DB::commit();
        toastr()->success(trans('messages.Update'));
        return redirect()->route('Pyment_Students.index');
        }catch(\Exception $e){
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);    
        }
   }

    public function destroy($request)
    {
        try {
            Payment::destroy($request->id);
            toastr()->error(trans('messages.Delete'));
            return redirect()->back();
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}