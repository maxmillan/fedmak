<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePropertyunitservicebillRequest;
use App\Http\Requests\UpdatePropertyunitservicebillRequest;
use App\Models\Lease;
use App\Models\Property;
use App\Models\Propertyunit;
use App\Models\Propertyunitservicebill;
use App\Repositories\PropertyunitservicebillRepository;
use App\Http\Controllers\AppBaseController;
use App\Servicebill;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PropertyunitservicebillController extends AppBaseController
{
    /** @var  PropertyunitservicebillRepository */
    private $propertyunitservicebillRepository;

    public function __construct(PropertyunitservicebillRepository $propertyunitservicebillRepo)
    {
        $this->propertyunitservicebillRepository = $propertyunitservicebillRepo;
    }

    /**
     * Display a listing of the Propertyunitservicebill.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->propertyunitservicebillRepository->pushCriteria(new RequestCriteria($request));
        $propertyunitservicebills = $this->propertyunitservicebillRepository->all();

        return view('propertyunitservicebills.index')
            ->with('propertyunitservicebills', $propertyunitservicebills);
    }

    /**
     * Show the form for creating a new Propertyunitservicebill.
     *
     * @return Response
     */
    public function create($id)
    {
        $propertyunitservicebills = Servicebill::all();
        $props =Propertyunit::where('id',$id)->get();
//        $leas = Lease::where('propertyunit_id',$id)->get();
//        foreach ($leas as $lea)
        return view('propertyunitservicebills.create',[
            'propertyunit_id'=>$id,
            'props'=>$props,
//            'lea'=>$lea
        ])->with('propertyunitservicebills', $propertyunitservicebills);



    }

    /**
     * Store a newly created Propertyunitservicebill in storage.
     *
     * @param CreatePropertyunitservicebillRequest $request
     *
     * @return Response
     */
    public function store(CreatePropertyunitservicebillRequest $request)

    {
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'amount' => ['required'],



        ]);
        if ($validator->fails()) {
            return redirect(url('admin/error'))
                ->withErrors($validator)
                ->withInput();
        }
        $input = $request->all();

        $propertyunitservicebill = $this->propertyunitservicebillRepository->create($input);

        Flash::success('House Bill saved successfully.');

        return redirect(url('admin/pUnitServiceBill/'. $request->propertyunit_id));
    }

    public function pUnitServiceBill($id){
        $propertyunitservicebills = Propertyunitservicebill::where('propertyunit_id',$id)->get();
        $properties =Propertyunit::where('id',$id)->get();
//        foreach ($propertyunitservicebills as$propertyunitservicebill)


        foreach ($properties as $property)
        return view('propertyunitservicebills.index',[
            'propertyunit_id'=>$id,
            'properties'=>$properties,
            'property_id'=>$property->property->id
        ])
            ->with('propertyunitservicebills', $propertyunitservicebills);
    }

    /**
     * Display the specified Propertyunitservicebill.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $propertyunitservicebill = $this->propertyunitservicebillRepository->findWithoutFail($id);

        if (empty($propertyunitservicebill)) {
            Flash::error('Propertyunitservicebill not found');

            return redirect(route('propertyunitservicebills.index'));
        }

        return view('propertyunitservicebills.show')->with('propertyunitservicebill', $propertyunitservicebill);
    }

    /**
     * Show the form for editing the specified Propertyunitservicebill.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $propertyunitservicebill = $this->propertyunitservicebillRepository->findWithoutFail($id);

        if (empty($propertyunitservicebill)) {
            Flash::error('Propertyunitservicebill not found');

            return redirect(route('propertyunitservicebills.index'));
        }

        return view('propertyunitservicebills.edit')->with('propertyunitservicebill', $propertyunitservicebill);
    }

    /**
     * Update the specified Propertyunitservicebill in storage.
     *
     * @param  int              $id
     * @param UpdatePropertyunitservicebillRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePropertyunitservicebillRequest $request)
    {
        $propertyunitservicebill = $this->propertyunitservicebillRepository->findWithoutFail($id);

        if (empty($propertyunitservicebill)) {
            Flash::error('Propertyunitservicebill not found');

            return redirect(route('propertyunitservicebills.index'));
        }

        $propertyunitservicebill = $this->propertyunitservicebillRepository->update($request->all(), $id);

        Flash::success('Propertyunitservicebill updated successfully.');

        return redirect(route('propertyunitservicebills.index'));
    }

    /**
     * Remove the specified Propertyunitservicebill from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $propertyunitservicebill = $this->propertyunitservicebillRepository->findWithoutFail($id);

        if (empty($propertyunitservicebill)) {
            Flash::error('Propertyunitservicebill not found');

            return redirect(route('propertyunitservicebills.index'));
        }

        $this->propertyunitservicebillRepository->delete($id);

        Flash::success('House Bill deleted successfully.');

        return redirect(url('admin/properties'));
    }
}
