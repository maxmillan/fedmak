<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;

class adminSendMessageController extends Controller
{
    public function index(){
        $admin = User::all();
        return view('backend.compose')->withAdmin($admin);
    }
}
