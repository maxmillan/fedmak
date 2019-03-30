<?php

namespace App\Http\Controllers;

use App\Finalreport;
use App\Http\Requests\CreateBillRequest;
use App\Http\Requests\UpdateBillRequest;
use App\Models\Lease;
use App\Models\Paidtenant;
use App\Models\Propertyunitservicebill;
use App\Models\Tenantaccount;
use App\Repositories\BillRepository;
use App\Http\Controllers\AppBaseController;
use App\Servicebill;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\DB;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class BillController extends AppBaseController
{
    /** @var  BillRepository */
    private $billRepository;

    public function __construct(BillRepository $billRepo)
    {
        $this->billRepository = $billRepo;
    }

    /**
     * Display a listing of the Bill.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->billRepository->pushCriteria(new RequestCriteria($request));
        $bills = $this->billRepository->all();

        return view('bills.index')
            ->with('bills', $bills);
    }

    /**
     * Show the form for creating a new Bill.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $this->billRepository->pushCriteria(new RequestCriteria($request));
        $bills = $this->billRepository->all();

//        $leases = Lease::with('propertyunit')->get();
        $leases = Lease::all();
        $services = \App\Models\Servicebill::all();

//        print_r($leases);die;

        return view('bills.create',[
            'bills'=>$bills,
            'leases'=>$leases,
            'services'=>$services,
        ]);
    }
    public function serviceBillDetails($id){
        $serviceBills = Propertyunitservicebill::where('id',$id)->with(['propertyunit','servicebill'])->get();
        if (count($serviceBills)){
            return response()->json($serviceBills);

        }
    }

    /**
     * Store a newly created Bill in storage.
     *
     * @param CreateBillRequest $request
     *
     * @return Response
     */

    public function store(CreateBillRequest $request)
    {
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'amount' => ['required'],


        ]);
        if ($validator->fails()) {
            return redirect(url('admin/bills/create'))
                ->withErrors($validator)
                ->withInput();
        }
        $input = $request->all();
//        print_r($input);die;

        DB::transaction(function()use ($input){

                //insert bill to bills table
                $bill = $this->billRepository->create($input);
//            if (!($lease==null)){
                    $balance=0;
                $paidAmount = Paidtenant::where('lease_id',$bill->lease_id)->first();
                    if ($paidAmount){
                        $balance =($input['amount']);
                        $balance1 = ($paidAmount->balance);
                        $balance2 =($balance1+$balance);

                        $totalBillableAmount = ($balance2);
                    }
                    else{
                    $tenant = Tenantaccount::where('lease_id',$bill->lease_id)->sum('amount');

                        $balance =($input['amount']);
                        $balance2 =($tenant+$balance);

                        $totalBillableAmount = ($balance2);
                    }

                $tenants = Tenantaccount::where('lease_id',$bill->lease_id)->get();
                if (count($tenants)){
//                    foreach ($tenants as $tenant){
//                        $total =($tenant->amount);
//                        $total1 = ($total+$totalBillableAmount);
//
//                    }

                    DB::table('tenantaccounts')->where('lease_id',$bill->lease_id)->update(['amount'=>($totalBillableAmount)]);


                }
                else{
                    //insert bill to tenants account table
                    $tenantAccount = Tenantaccount::create([
                        'user_id' => $bill->lease->user_id,
                        'lease_id' => $bill->lease_id,
                        'bill_id' => $bill->id,
                        'property_id' => $bill->lease->propertyunit->property->id,
                        'transaction_type' => credit,
                        'amount' => $totalBillableAmount,
                        'house' => $bill->lease->propertyunit->house,

                    ]);
                }

                DB::table('paidtenants')->where('lease_id',$bill->lease_id)->update(['balance'=>($totalBillableAmount)]);
                DB::table('tenantaccounts')->where('lease_id',$bill->lease_id)->where('amount','<=',0)->delete();


                $finalReports = Finalreport::create([
                    'lease_id'=>$bill->lease_id,
                    'user_id'=>$bill->lease->user_id,
                    'property_id'=>$bill->lease->propertyunit->property_id,
                    'amount'=>$bill->amount,
                    'transaction_type'=>'credit'
                ]);

        });


        Flash::success('Tenant Billed successfully.');

        return redirect(route('bills.index'));
    }

    /**
     * Display the specified Bill.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $bill = $this->billRepository->findWithoutFail($id);

        if (empty($bill)) {
            Flash::error('Bill not found');

            return redirect(route('bills.index'));
        }

        return view('bills.show')->with('bill', $bill);
    }

    /**
     * Show the form for editing the specified Bill.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $bill = $this->billRepository->findWithoutFail($id);

        if (empty($bill)) {
            Flash::error('Bill not found');

            return redirect(route('bills.index'));
        }

        return view('bills.edit')->with('bill', $bill);
    }

    /**
     * Update the specified Bill in storage.
     *
     * @param  int              $id
     * @param UpdateBillRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBillRequest $request)
    {
        $bill = $this->billRepository->findWithoutFail($id);

        if (empty($bill)) {
            Flash::error('Bill not found');

            return redirect(route('bills.index'));
        }

        $bill = $this->billRepository->update($request->all(), $id);

        Flash::success('Bill updated successfully.');

        return redirect(route('bills.index'));
    }

    /**
     * Remove the specified Bill from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $bill = $this->billRepository->findWithoutFail($id);

        if (empty($bill)) {
            Flash::error('Bill not found');

            return redirect(route('bills.index'));
        }

        $this->billRepository->delete($id);

        Flash::success('Bill deleted successfully.');

        return redirect(route('bills.index'));
    }
}
