<?php

namespace App\Http\Controllers\Parent;

use App\Models\My_Parent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class profileParentController extends Controller
{
    public function index(){
        $information = My_Parent::findorFail(auth()->user()->id);
        return view('Dashboard.parent.profile.profile',compact('information'));
    }
    public function update(Request $request,$id){
        $information = My_Parent::findorFail($id);

        if (!empty($request->password)) {
            $information->Name_Father = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $information->password = Hash::make($request->password);
            $information->email = $request->email;
            $information->save();
        } else {
            $information->Name_Father = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $information->email = $request->email;
            $information->save();
        }
        toastr()->success(trans('messages.Update'));
        return redirect()->back();
    }
}
