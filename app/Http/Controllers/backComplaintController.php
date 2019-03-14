<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Complaint;
use App\Jobs\SendSms;
use App\Notifications\NotifyComplaintAdmin;
use Illuminate\Http\Request;
use Session;

class backComplaintController extends Controller
{
    public function index(){
        $complains = Complaint::orderByDesc('id')->get();
        return view('backend.complaint')->with('complains',$complains);
    }
    public function store(Request $request){
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'message' => ['required'],


        ]);
        if ($validator->fails()) {
            return redirect(url('admin/complaints'))
                ->withErrors($validator)
                ->withInput();
        }

        $complain = new Complaint;
        $complain-> message = $request->message;
        $complain->save();

        SendSms::dispatch($request->message,'0708525144');


//        $complaint = Complaint::find($request->complaint_id);
//        Admin::find($complaint->admin->id)->notify(new NotifyComplaintAdmin($complaint));

        Session::flash('success', 'COMPLAINT SUCCESSFULLY SENT')    ;
        return redirect(route('complaints.index'));
    }
}
