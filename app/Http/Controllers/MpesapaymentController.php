<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMpesapaymentRequest;
use App\Http\Requests\UpdateMpesapaymentRequest;
use App\Models\Lease;
use App\Models\Tenantaccount;
use App\Repositories\MpesapaymentRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\DB;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class MpesapaymentController extends AppBaseController
{
    /** @var  MpesapaymentRepository */
    private $mpesapaymentRepository;

    public function __construct(MpesapaymentRepository $mpesapaymentRepo)
    {
        $this->mpesapaymentRepository = $mpesapaymentRepo;
    }

    /**
     * Display a listing of the Mpesapayment.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->mpesapaymentRepository->pushCriteria(new RequestCriteria($request));
        $mpesapayments = $this->mpesapaymentRepository->all();

        return view('mpesapayments.index')
            ->with('mpesapayments', $mpesapayments);
    }

    /**
     * Show the form for creating a new Mpesapayment.
     *
     * @return Response
     */
    public function create()
    {
        return view('mpesapayments.create');
    }

    /**
     * Store a newly created Mpesapayment in storage.
     *
     * @param CreateMpesapaymentRequest $request
     *
     * @return Response
     */
    public function store(CreateMpesapaymentRequest $request)
    {
        $input = $request->all();

//        DB::transaction(function()use ($input) {
//            $lease = Lease::find($input['lease_id']);
            $mpesapayment = $this->mpesapaymentRepository->create($input);

//            $tenantAccount = Tenantaccount::create([
//                'user_id' => $lease->user_id,
//                'lease_id' => $input['lease_id'],
//                'payment_id' => $mpesapayment->id,
//                'transaction_type' => credit,
////                'bill_amount' => 'hope',
//                'house' => $lease->propertyunit->house,
//
//            ]);

//        });

        Flash::success('Mpesapayment saved successfully.');

        return redirect(route('mpesapayments.index'));
    }

    /**
     * Display the specified Mpesapayment.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $mpesapayment = $this->mpesapaymentRepository->findWithoutFail($id);

        if (empty($mpesapayment)) {
            Flash::error('Mpesapayment not found');

            return redirect(route('mpesapayments.index'));
        }

        return view('mpesapayments.show')->with('mpesapayment', $mpesapayment);
    }

    /**
     * Show the form for editing the specified Mpesapayment.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $mpesapayment = $this->mpesapaymentRepository->findWithoutFail($id);

        if (empty($mpesapayment)) {
            Flash::error('Mpesapayment not found');

            return redirect(route('mpesapayments.index'));
        }

        return view('mpesapayments.edit')->with('mpesapayment', $mpesapayment);
    }

    /**
     * Update the specified Mpesapayment in storage.
     *
     * @param  int              $id
     * @param UpdateMpesapaymentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMpesapaymentRequest $request)
    {
        $mpesapayment = $this->mpesapaymentRepository->findWithoutFail($id);

        if (empty($mpesapayment)) {
            Flash::error('Mpesapayment not found');

            return redirect(route('mpesapayments.index'));
        }

        $mpesapayment = $this->mpesapaymentRepository->update($request->all(), $id);

        Flash::success('Mpesapayment updated successfully.');

        return redirect(route('mpesapayments.index'));
    }

    /**
     * Remove the specified Mpesapayment from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $mpesapayment = $this->mpesapaymentRepository->findWithoutFail($id);

        if (empty($mpesapayment)) {
            Flash::error('Mpesapayment not found');

            return redirect(route('mpesapayments.index'));
        }

        $this->mpesapaymentRepository->delete($id);

        Flash::success('Mpesapayment deleted successfully.');

        return redirect(route('mpesapayments.index'));
    }
}
