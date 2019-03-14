<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use Auth;
use Session;
use Laracasts\Flash\FlashServiceProvider;

class tenantSendMessageController extends Controller
{

    public function index(){
        return view('frontend.compose');
    }

    public function store(Request $request){
        $message= new Message;
        $message->subject = $request->subject;
        $message->message = $request->message;
        $message->user_id = Auth::id();

        $message->save();
        Session::flash('success', 'The message was successfully sent!!');

        return view('frontend.compose');


    }
}
