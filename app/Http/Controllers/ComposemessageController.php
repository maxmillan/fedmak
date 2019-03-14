<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComposemessageController extends Controller
{
    public function index(){
        return view('frontend.compose');
    }
}
