<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Complaint;
use App\Jobs\SendSms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use App\Notifications\NotifyComplaintAdmin;
//use Auth;
class complaintController extends Controller
{
    public function index(){

        $complaints = Complaint::orderByDesc('id')->get();
        return view('frontend.complaint')->with('complaints',$complaints);
    }

    public function store(Request $request){


        $complaints = new Complaint;
        $complaints->message = $request->message;
        $complaints->user_id = Auth::id();

        $complaints->save();
        $getUser = User::where('id',Auth::id())->first();

        SendSms::dispatch($request->message ." ". $getUser->name." ".$getUser->last,'0790268795');

//        $complaint = Complaint::get($request->complaint_id);
//        $user = User::all();
//        dd($complaint);
//        $user->notify(new NotifyComplaintAdmin($complaint));

        Session::flash('success', 'COMPLAINT SUCCESSFULLY SENT');
        return redirect(route('complaint.index'));

    }
}
