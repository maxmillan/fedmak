<?php

namespace App\Http\Controllers;

use App\Message;
use App\Tenantmessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessagesController extends Controller
{
    public function index(){

        $messages = Tenantmessage::where('user_id',Auth::id())->get();

        return view('frontend.messages')->withMessages($messages);
    }
}
