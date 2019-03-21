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
        $leases = Propertyunitservicebill::with('propertyunit')->get();
        $services = \App\Models\Servicebill::all();

//        print_r($leases);die;

        return view('bills.create',[
            'bills'=>$bills,
            'leases'=>$leases,
            'services'=>$services,
        ]);
    }
    public function serviceBillDetails($id){
        $serviceBill = Propertyunitservicebill::where('id',$id)->with(['propertyunit','servicebill'])->first();
        return response()->json($serviceBill);
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
            $lease = Lease::find($input['lease_id']);
            //insert bill to bills table
            $bill = $this->billRepository->create($input);
//            if (!($lease==null)){
                $totalBillableAmount = $bill->amount;
                $paidAmounts = Paidtenant::where('lease_id',$input['lease_id'])->get();
                if(count($paidAmounts)){
                    foreach ($paidAmounts as $paidAmount){
                        $balance = ($bill->amount);
                        $balance1 = ($paidAmount->balance);

                        $totalBillableAmount = ($balance1+$balance);
                    }

            }
            $tenants = Tenantaccount::where('lease_id',$input['lease_id'])->get();
            if (count($tenants)){
                DB::table('tenantaccounts')->where('lease_id',$input['lease_id'])->update(['amount'=>($totalBillableAmount)]);

            }
            else{
                //insert bill to tenants account table
                $tenantAccount = Tenantaccount::create([
                    'user_id' => $lease->user_id,
                    'lease_id' => $input['lease_id'],
                    'bill_id' => $bill->id,
                    'property_id' => $lease->propertyunit->property->id,
                    'transaction_type' => credit,
                    'amount' => $totalBillableAmount,
                    'house' => $lease->propertyunit->house,

                ]);
            }

            DB::table('paidtenants')->where('lease_id',$input['lease_id'])->update(['balance'=>($totalBillableAmount)]);
            DB::table('tenantaccounts')->where('amount','<=',0)->delete();


            $finalReports = Finalreport::create([
                'lease_id'=>$lease->id,
                'user_id'=>$lease->user->id,
                'property_id'=>$lease->propertyunit->property->id,
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
