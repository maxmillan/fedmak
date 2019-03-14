<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateServicebillRequest;
use App\Http\Requests\UpdateServicebillRequest;
use App\Repositories\ServicebillRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ServicebillController extends AppBaseController
{
    /** @var  ServicebillRepository */
    private $servicebillRepository;

    public function __construct(ServicebillRepository $servicebillRepo)
    {
        $this->servicebillRepository = $servicebillRepo;
    }

    /**
     * Display a listing of the Servicebill.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->servicebillRepository->pushCriteria(new RequestCriteria($request));
        $servicebills = $this->servicebillRepository->all();

        return view('servicebills.index')
            ->with('servicebills', $servicebills);
    }

    /**
     * Show the form for creating a new Servicebill.
     *
     * @return Response
     */
    public function create()
    {
        return view('servicebills.create');
    }

    /**
     * Store a newly created Servicebill in storage.
     *
     * @param CreateServicebillRequest $request
     *
     * @return Response
     */
    public function store(CreateServicebillRequest $request)
    {
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'name' => ['required'],


        ]);
        if ($validator->fails()) {
            return redirect(url('admin/servicebills/create'))
                ->withErrors($validator)
                ->withInput();
        }
        $input = $request->all();

        $servicebill = $this->servicebillRepository->create($input);

        Flash::success('Servicebill saved successfully.');

        return redirect(route('servicebills.index'));
    }

    /**
     * Display the specified Servicebill.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $servicebill = $this->servicebillRepository->findWithoutFail($id);

        if (empty($servicebill)) {
            Flash::error('Servicebill not found');

            return redirect(route('servicebills.index'));
        }

        return view('servicebills.show')->with('servicebill', $servicebill);
    }

    /**
     * Show the form for editing the specified Servicebill.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $servicebill = $this->servicebillRepository->findWithoutFail($id);

        if (empty($servicebill)) {
            Flash::error('Servicebill not found');

            return redirect(route('servicebills.index'));
        }

        return view('servicebills.edit')->with('servicebill', $servicebill);
    }

    /**
     * Update the specified Servicebill in storage.
     *
     * @param  int              $id
     * @param UpdateServicebillRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateServicebillRequest $request)
    {
        $servicebill = $this->servicebillRepository->findWithoutFail($id);

        if (empty($servicebill)) {
            Flash::error('Servicebill not found');

            return redirect(route('servicebills.index'));
        }

        $servicebill = $this->servicebillRepository->update($request->all(), $id);

        Flash::success('Servicebill updated successfully.');

        return redirect(route('servicebills.index'));
    }

    /**
     * Remove the specified Servicebill from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $servicebill = $this->servicebillRepository->findWithoutFail($id);

        if (empty($servicebill)) {
            Flash::error('Servicebill not found');

            return redirect(route('servicebills.index'));
        }

        $this->servicebillRepository->delete($id);

        Flash::success('Servicebill deleted successfully.');

        return redirect(route('servicebills.index'));
    }
}
