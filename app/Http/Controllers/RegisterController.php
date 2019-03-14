<?php

namespace App\Http\Controllers;

use App\Models\Propertyunit;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Validator;
use Session;

class RegisterController extends Controller
{
//    use RegistersUsers;


    public function index(){

        return view('auth.register');
}


    protected function validator(Request $request)
    {
        return Validator::make($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8L', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function store(Request $request)
    {
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'name' => ['required'],
            'idno' => ['required', 'unique:users'],
            'phone' => ['required', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],

        ]);
        if ($validator->fails()) {
            return redirect(url('admin/users/create'))
                ->withErrors($validator)
                ->withInput();
        }

        $users = User::create([
            'name' => $request['name'],
            'last' => $request['last'],
            'idno' => $request['idno'],
            'phone' => $request['phone'],
            'password' => Hash::make($request['password']),


        ]);
        Session::flash('success', 'Tenant Registered Successfully');

        return redirect(route('users.index'));



    }
    public function update(Request $request, $id)
    {
        $password = User::find($id);


        $this->validate($request, [

            'password' => 'required|string|min:6|confirmed'
        ]);


        $password->password = Hash::make($request->input('password'));
        $password->name = $request->input('name');
        $password->last = $request->input('last');
        $password->email = $request->input('email');
        $password->idno = $request->input('idno');
        $password->phone = $request->input('phone');
        $password->save();


        Session::flash('success', 'Tenant Profile updated');


        return redirect()->route('users.index', $password->id);
    }

}
