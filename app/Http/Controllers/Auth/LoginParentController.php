<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginParentRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginParentController extends Controller
{
    public function create(){

        return view('Dashboard.Auth.Parent.login');

    }
    public function store(LoginParentRequest $request){
        if( $request->authenticate()){
            
            $request->session()->regenerate();

            return redirect()->intended(RouteServiceProvider::PARENT);
        }
        return redirect()->back()->withErrors(['email' => (trans('auth.failed'))]);
    }
    public function destroy(Request $request){

        Auth::guard('parent')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}