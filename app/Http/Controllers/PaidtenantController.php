<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePaidtenantRequest;
use App\Http\Requests\UpdatePaidtenantRequest;
use App\Models\Paidtenant;
use App\Repositories\PaidtenantRepository;
use App\Http\Controllers\AppBaseController;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PaidtenantController extends AppBaseController
{
    /** @var  PaidtenantRepository */
    private $paidtenantRepository;

    public function __construct(PaidtenantRepository $paidtenantRepo)
    {
        $this->paidtenantRepository = $paidtenantRepo;
    }

    /**
     * Display a listing of the Paidtenant.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->paidtenantRepository->pushCriteria(new RequestCriteria($request));
        $paidtenants = $this->paidtenantRepository->all();

        return view('paidtenants.index')
            ->with('paidtenants', $paidtenants);
    }

    /**
     * Show the form for creating a new Paidtenant.
     *
     * @return Response
     */
    public function create()
    {
        return view('paidtenants.create');
    }

    /**
     * Store a newly created Paidtenant in storage.
     *
     * @param CreatePaidtenantRequest $request
     *
     * @return Response
     */
    public function store(CreatePaidtenantRequest $request)
    {
        $input = $request->all();

        $paidtenant = $this->paidtenantRepository->create($input);

        Flash::success('Paidtenant saved successfully.');

        return redirect(route('paidtenants.index'));
    }

    public function paidTenants($id){

        $paidtenants = Paidtenant::where('property_id',$id)->orderByDesc('id')->get();
        return view('paidtenants.index',[
            'property_id'=>$id,
            'paidtenants'=>$paidtenants
        ]);
    }


    public function getPaidTenants(Request $request, $id){
        if(!$request->isMethod('POST')){
            return redirect('admin/paidTenants/'.$id);
        };

        $from = Carbon::parse($request->from)->startOfDay();
        $to = Carbon::parse($request->to)->endOfDay();
        $paidtenants = Paidtenant::where('property_id',$id)->whereBetween('created_at',[$from,$to])->get();
        return view('paidtenants.index',[
            'property_id'=>$id,
            'paidtenants'=>$paidtenants
        ]);
    }

    /**
     * Display the specified Paidtenant.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $paidtenant = $this->paidtenantRepository->findWithoutFail($id);

        if (empty($paidtenant)) {
            Flash::error('Paidtenant not found');

            return redirect(route('paidtenants.index'));
        }

        return view('paidtenants.show')->with('paidtenant', $paidtenant);
    }

    /**
     * Show the form for editing the specified Paidtenant.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $paidtenant = $this->paidtenantRepository->findWithoutFail($id);

        if (empty($paidtenant)) {
            Flash::error('Paidtenant not found');

            return redirect(route('paidtenants.index'));
        }

        return view('paidtenants.edit')->with('paidtenant', $paidtenant);
    }

    /**
     * Update the specified Paidtenant in storage.
     *
     * @param  int              $id
     * @param UpdatePaidtenantRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePaidtenantRequest $request)
    {
        $paidtenant = $this->paidtenantRepository->findWithoutFail($id);

        if (empty($paidtenant)) {
            Flash::error('Paidtenant not found');

            return redirect(route('paidtenants.index'));
        }

        $paidtenant = $this->paidtenantRepository->update($request->all(), $id);

        Flash::success('Paidtenant updated successfully.');

        return redirect(route('paidtenants.index'));
    }

    /**
     * Remove the specified Paidtenant from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $paidtenant = $this->paidtenantRepository->findWithoutFail($id);

        if (empty($paidtenant)) {
            Flash::error('Paidtenant not found');

            return redirect(route('paidtenants.index'));
        }

        $this->paidtenantRepository->delete($id);

        Flash::success('Paidtenant deleted successfully.');

        return redirect(route('paidtenants.index'));
    }
}
