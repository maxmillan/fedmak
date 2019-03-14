<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class BackmessageController extends Controller
{
    public function index(){
        $meso = Message::where('status',false)->get();
        $meso = $meso->unique('user_id');
//        print_r($meso);die;

        return view('backend.backmessages',[
            'meso' => $meso
        ]);
    }

}
