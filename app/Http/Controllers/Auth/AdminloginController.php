<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminloginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    public function ShowLoginForm(){
        return view('auth.Adminlogin');
    }

    public function login(Request $request){
        $this->validate($request, [
            'idno' => 'required|min:8',
            'password' => 'required|min:6',
        ]);

        if(Auth::guard('admin')->attempt(['idno'=>$request->idno,'password'=>$request->password], $request->remember)){
            return redirect()->intended(route('admin.dashboard'));

        }
        return redirect()->back()->withInput($request->only('idno','remember'));
    }

}
