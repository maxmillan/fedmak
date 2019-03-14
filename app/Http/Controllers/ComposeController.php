<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Notifications\InvoicePaid;
use App\Tenantmessage;
use App\User;
use Illuminate\Http\Request;
use Session;

class ComposeController extends Controller
{
    public function index(){
            $admins = User::all();
            return view('backend.compose')->withAdmins($admins);
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
