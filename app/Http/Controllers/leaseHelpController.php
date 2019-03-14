<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class leaseHelpController extends Controller
{
    public function index(){
        $admins = User::all();
        return view('leases.create')->withAdmins($admins);
    }


}
