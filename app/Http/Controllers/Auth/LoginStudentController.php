<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginStudentRequest;

class LoginStudentController extends Controller
{
    public function create(){

        return view('Dashboard.Auth.Student.login');
    }

    public function store(LoginStudentRequest $request){

        if($request->authenticate()){

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::STUDENT);
        }else{
            return redirect()->back()->with('message', 'يوجد خطا في كلمة المرور او اسم المستخدم');
        }
        

    }
    public function destroy(Request $request){

        Auth::guard('student')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
