<?php

namespace App\Http\Controllers;

use     Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PayRentController extends Controller
{
    public function index(){
        return view('frontend.payrent');
    }
}
