<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginTeacherRequest;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class LoginTeacherController extends Controller
{
    public function create(){

        return view('Dashboard.Auth.Teacher.login');
       
    }

    public function store(LoginTeacherRequest $request){

        if($request->authenticate()){

            $request->session()->regenerate();
    
             return redirect()->intended(RouteServiceProvider::TEACHER);
        } 
        
    }
    public function destroy(Request $request){

        Auth::guard('teacher')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
