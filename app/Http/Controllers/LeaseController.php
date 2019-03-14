<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLeaseRequest;
use App\Http\Requests\UpdateLeaseRequest;
use App\Models\Propertyunit;
use App\Repositories\LeaseRepository;
use App\Http\Controllers\AppBaseController;
use App\User;
use Illuminate\Http\Request;
use Flash;
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
        $leases = $this->leaseRepository->all();

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
            'propertyunit_id'=>['unique:leases']

        ]);
        if ($validator->fails()) {
            return redirect(url('admin/leases/create'))
                ->withErrors($validator)
                ->withInput();
        }
        $input = $request->all();

        $lease = $this->leaseRepository->create($input);

        Flash::success('Lease saved successfully.');

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
        $lease = $this->leaseRepository->findWithoutFail($id);

        if (empty($lease)) {
            Flash::error('Lease not found');

            return redirect(route('leases.index'));
        }

        return view('leases.edit')->with('lease', $lease);
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

        Flash::success('Lease updated successfully.');

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

        $this->leaseRepository->delete($id);

        Flash::success('Lease deleted successfully.');

        return redirect(route('leases.index'));
    }
}
