<?php

namespace App\Http\Controllers;

use App\Message;
use App\Tenantmessage;
use App\User;
use Illuminate\Http\Request;

class ReplyMessageController extends Controller
{
        public function index(){
            $replies = Message::all();
            return view('backend.replyMessage')->withReplies($replies);
        }


    public function store(Request $request)
    {
        $message = new Tenantmessage();
        $message->user_id = $request->user_id;
        $message->subject = $request->subject;
        $message->message = $request->message;

        $message->save();

        Session::flash('success', 'The message was successfully sent!!');

        return view('backend.dashboard');

    }


}
