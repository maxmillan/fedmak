<?php

namespace App\Http\Controllers;

use App\Finalreport;
use Carbon\Carbon;
use Illuminate\Http\Request;

class finalReportController extends Controller
{
    public function index(){
        $finalReports = Finalreport::orderByDesc('id')->get();
//        $finalReports = $finalReports->unique('id');
//        $finals = $finals->unique('id');
        return view('backend.finalReport',[
            'finalReports'=>$finalReports,
        ]);
    }

    public function EachTenantReport($id)
    {
        $finalReports = Finalreport::where('user_id', $id)->orderByDesc('id')->get();
        $totals = Finalreport::where('user_id', $id)->where('transaction_type','debit')->sum('amount');


        return view('backend.finalReport', [
            'property_id' => $id,
            'finalReports' => $finalReports,
            'totals' => $totals,
        ]);
    }

        public function eachPropertyReport($id){

        $finalReports = Finalreport::where('property_id',$id)->orderByDesc('id')->get();
        $totals = Finalreport::where('property_id',$id)->where('transaction_type','debit')->sum('amount');
//        $finals = Finalreport::where('property_id',$id)->where('transaction_type', 'debit')->get();
        return view('backend.finalReport',[
            'property_id'=>$id,
            'finalReports'=>$finalReports,
            'totals'=>$totals,
//            'finals'=>$finals
        ]);
        }
        public function getPropertyReportDetails(Request $request,$id){
            if(!$request->isMethod('POST')) {
                return redirect('admin/propertReport/' . $id);
            }
            $from = Carbon::parse($request->from)->startOfDay();
            $to = Carbon::parse($request->to)->endOfDay();
            $finalReports =Finalreport::where('property_id',$id)->whereBetween('created_at',[$from,$to])->get();
            $totals = Finalreport::where('property_id',$id)->where('transaction_type','debit')->whereBetween('created_at',[$from,$to])->sum('amount');

            return view('backend.finalReport',[
                'property_id'=>$id,
                'totals'=>$totals,
                'finalReports'=>$finalReports
            ]);

        }


}
