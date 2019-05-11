<?php

namespace App\Http\Controllers;

use App\Finalreport;
use App\Http\Requests\CreateLeaseRequest;
use App\Http\Requests\UpdateLeaseRequest;
use App\Models\Bill;
use App\Models\Lease;
use App\Models\Propertyunit;
use App\Models\Propertyunitservicebill;
use App\Models\Tenantaccount;
use App\Repositories\LeaseRepository;
use App\Http\Controllers\AppBaseController;
use App\User;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\DB;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class LeaseController extends AppBaseController
{
    /** @var  LeaseRepository */
    private $leaseRepository;

    public function __construct(LeaseRepository $leaseRepo)
    {
        $this->leaseRepository = $leaseRepo;
    }

    /**
     * Display a listing of the Lease.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->leaseRepository->pushCriteria(new RequestCriteria($request));
//        $leases = $this->leaseRepository->all();
        $leases = Lease::orderByDesc('id')->get();

        return view('leases.index')
            ->with('leases', $leases);
    }

    /**
     * Show the form for creating a new Lease.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $this->leaseRepository->pushCriteria(new RequestCriteria($request));
        $leases = $this->leaseRepository->all();

        $users = User::all();
        $houseNumbers = Propertyunit::all();
        return view('leases.create',[
            'leases'=>$leases,
            'users'=>$users,
            'houseNumbers'=>$houseNumbers

        ]);
    }

    /**
     * Store a newly created Lease in storage.
     *
     * @param CreateLeaseRequest $request
     *
     * @return Response
     */
    public function store(CreateLeaseRequest $request)
    {
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'status' => ['required'],
//            'propertyunit_id'=>['unique:leases']

        ]);
        if ($validator->fails()) {
            return redirect(url('admin/leases/create'))
                ->withErrors($validator)
                ->withInput();
        }
        $input = $request->all();

        $lease = $this->leaseRepository->create($input);
        $findHouseNos = Propertyunit::find($input['propertyunit_id']);
        DB::table('propertyunits')->where('house',$findHouseNos->house)->update(['status'=>booked]);
        $findLeases = Lease::where('propertyunit_id',$input['propertyunit_id'])->get();
            foreach ($findLeases as $findLease)
        $propertyUnitBills = Propertyunitservicebill::where('propertyunit_id',$findLease->propertyunit_id)->get();
            foreach ($propertyUnitBills as $propertyUnitBill)
                $propertyUnits = Propertyunitservicebill::where('propertyunit_id',$findLease->propertyunit_id)->sum('amount');
                //insert bill to bills table
                $monthlyBill = Bill::create([
                    'amount' =>$propertyUnits,
                    'lease_id' =>$findLease->id,
                    'servicebill_id' =>$propertyUnitBill->servicebill_id
                ]);
                $finalReports = Finalreport::create([
                    'lease_id'=>$findLease->id,
                    'user_id'=>$findLease->user->id,
                    'property_id'=>$findLease->propertyunit->property_id,
                    'amount'=>$propertyUnits,
                    'transaction_type'=>'credit'
                ]);
                $bills = Bill::where('lease_id',$findLease->id)->get();
                foreach ($bills as $bill){
                    $tenantAccount = Tenantaccount::create([
                        'user_id' => $findLease->user_id,
                        'lease_id' => $findLease->id,
                        'bill_id' => $bill->id,
                        'property_id' => $findLease->propertyunit->property->id,
                        'transaction_type' => credit,
                        'amount' => $propertyUnits,
                        'house' => $findLease->propertyunit->house,

                    ]);
                }






        Flash::success('Tenant Details saved successfully.');

        return redirect(route('leases.index'));
    }

    /**
     * Display the specified Lease.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $lease = $this->leaseRepository->findWithoutFail($id);

        if (empty($lease)) {
            Flash::error('Lease not found');

            return redirect(route('leases.index'));
        }

        return view('leases.show')->with('lease', $lease);
    }

    /**
     * Show the form for editing the specified Lease.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $users=\App\Models\User::all();
        $houseNumbers = Propertyunit::all();
        $lease = $this->leaseRepository->findWithoutFail($id);

        if (empty($lease)) {
            Flash::error('Lease not found');

            return redirect(route('leases.index'));
        }

        return view('leases.edit',[
            'users'=>$users,
            'houseNumbers'=>$houseNumbers,
        ])->with('lease', $lease);
    }

    /**
     * Update the specified Lease in storage.
     *
     * @param  int              $id
     * @param UpdateLeaseRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLeaseRequest $request)
    {
        $lease = $this->leaseRepository->findWithoutFail($id);

        if (empty($lease)) {
            Flash::error('Lease not found');

            return redirect(route('leases.index'));
        }

        $lease = $this->leaseRepository->update($request->all(), $id);

        Flash::success('Tenant Details updated successfully.');

        return redirect(route('leases.index'));
    }

    /**
     * Remove the specified Lease from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $lease = $this->leaseRepository->findWithoutFail($id);

        if (empty($lease)) {
            Flash::error('Lease not found');

            return redirect(route('leases.index'));
        }
        $findLeases = Lease::find($id);
        DB::table('propertyunits')->where('house',$findLeases->propertyunit->house)->update(['status'=>null]);
        DB::table('leases')->where('propertyunit_id',$findLeases->propertyunit_id)->update(['status'=>'TERMINATED'] );
//        $this->leaseRepository->delete($id);

        Flash::success('Tenant Details Terminated successfully.');

        return redirect(route('leases.index'));
    }
}
