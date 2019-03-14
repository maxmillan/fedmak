<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class BackreadmessageController extends Controller
{
    public function index(){
        $messages = Message::all();
        return view('backend.readmessage')->withMessages($messages);
    }

    public function userMessages($id){
        $message = Message::where('user_id',$id)->first();
        $message->status = 1;
        $message->save();

        return view('backend.readmessage',[
            'messages' => $message
        ]);

    }
}
