<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTenantaccountRequest;
use App\Http\Requests\UpdateTenantaccountRequest;
use App\Models\Paidtenant;
use App\Models\Tenantaccount;
use App\Mpesapayment;
use App\Repositories\TenantaccountRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class TenantaccountController extends AppBaseController
{
    /** @var  TenantaccountRepository */
    private $tenantaccountRepository;

    public function __construct(TenantaccountRepository $tenantaccountRepo)
    {
        $this->tenantaccountRepository = $tenantaccountRepo;
    }

    /**
     * Display a listing of the Tenantaccount.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->tenantaccountRepository->pushCriteria(new RequestCriteria($request));
        $tenantaccounts = $this->tenantaccountRepository->all();

        return view('tenantaccounts.index')
            ->with('tenantaccounts', $tenantaccounts);
    }

    /**
     * Show the form for creating a new Tenantaccount.
     *
     * @return Response
     */
    public function create()
    {
        return view('tenantaccounts.create');
    }

    public function unpaidTenants($id){
        $tenantaccounts = Tenantaccount::where('property_id',$id)->get();
        $tenantaccounts=$tenantaccounts->unique('user_id');
        return view('tenantaccounts.index',[
            'property_id'=>$id,
            'tenantaccounts'=>$tenantaccounts
        ]);
    }

    /**
     * Store a newly created Tenantaccount in storage.
     *
     * @param CreateTenantaccountRequest $request
     *
     * @return Response
     */
    public function store(CreateTenantaccountRequest $request)
    {
        $input = $request->all();

        $tenantaccount = $this->tenantaccountRepository->create($input);

        Flash::success('Tenantaccount saved successfully.');

        return redirect(route('tenantaccounts.index'));
    }

    /**
     * Display the specified Tenantaccount.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tenantaccount = $this->tenantaccountRepository->findWithoutFail($id);

        if (empty($tenantaccount)) {
            Flash::error('Tenantaccount not found');

            return redirect(route('tenantaccounts.index'));
        }

        return view('tenantaccounts.show')->with('tenantaccount', $tenantaccount);
    }

    /**
     * Show the form for editing the specified Tenantaccount.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tenantaccount = $this->tenantaccountRepository->findWithoutFail($id);

        if (empty($tenantaccount)) {
            Flash::error('Tenantaccount not found');

            return redirect(route('tenantaccounts.index'));
        }

        return view('tenantaccounts.edit')->with('tenantaccount', $tenantaccount);
    }

    /**
     * Update the specified Tenantaccount in storage.
     *
     * @param  int              $id
     * @param UpdateTenantaccountRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTenantaccountRequest $request)
    {
        $tenantaccount = $this->tenantaccountRepository->findWithoutFail($id);

        if (empty($tenantaccount)) {
            Flash::error('Tenantaccount not found');

            return redirect(route('tenantaccounts.index'));
        }

        $tenantaccount = $this->tenantaccountRepository->update($request->all(), $id);

        Flash::success('Tenantaccount updated successfully.');

        return redirect(route('tenantaccounts.index'));
    }

    /**
     * Remove the specified Tenantaccount from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tenantaccount = $this->tenantaccountRepository->findWithoutFail($id);

        if (empty($tenantaccount)) {
            Flash::error('Tenantaccount not found');

            return redirect(route('tenantaccounts.index'));
        }

        $this->tenantaccountRepository->delete($id);

        Flash::success('Tenantaccount deleted successfully.');

        return redirect(route('tenantaccounts.index'));
    }
}
