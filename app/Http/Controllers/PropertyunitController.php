<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePropertyunitRequest;
use App\Http\Requests\UpdatePropertyunitRequest;
use App\Models\Property;
use App\Models\Propertyunit;
use App\Repositories\PropertyunitRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PropertyunitController extends AppBaseController
{
    /** @var  PropertyunitRepository */
    private $propertyunitRepository;

    public function __construct(PropertyunitRepository $propertyunitRepo)
    {
        $this->propertyunitRepository = $propertyunitRepo;
    }

    /**
     * Display a listing of the Propertyunit.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->propertyunitRepository->pushCriteria(new RequestCriteria($request));
        $propertyunits = $this->propertyunitRepository->all();

        return view('propertyunits.index')
            ->with('propertyunits', $propertyunits);
    }

    /**
     * Show the form for creating a new Propertyunit.
     *
     * @return Response
     */
    public function create($id)
    {
        $creates = Property::where('id',$id)->get();

        return view('propertyunits.create',[
            'property_id'=>$id,
            'creates'=>$creates
        ]);
    }

    public function pUnits($id){
        $propertyunits = Propertyunit::where('property_id',$id)->get();
        $mesos = Property::where('id',$id)->get();
        return view('propertyunits.index',[
            'property_id'=>$id,
            'mesos'=>$mesos
        ])
            ->with('propertyunits', $propertyunits);
    }
    public function vacantHouses($id){
        $vacantHouses = Propertyunit::where('property_id',$id)->where('status',null)->get();

        return view('backend.vacantHouses',[
            'vacantHouses'=>$vacantHouses
        ]);
    }

    /**
     * Store a newly created Propertyunit in storage.
     *
     * @param CreatePropertyunitRequest $request
     *
     * @return Response
     */
    public function store(CreatePropertyunitRequest $request)
    {
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'house' => ['required'],
            'housetype' => ['required'],


        ]);
        if ($validator->fails()) {
            return redirect(url('admin/createPUnit/'.$request->property_id))
                ->withErrors($validator)
                ->withInput();
        }
        $input = $request->all();

        $propertyunit = $this->propertyunitRepository->create($input);

        Flash::success('Propertyunit saved successfully.');

        return redirect(url('admin/pUnits/'.$request->property_id));
    }

    /**
     * Display the specified Propertyunit.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $propertyunit = $this->propertyunitRepository->findWithoutFail($id);

        if (empty($propertyunit)) {
            Flash::error('Propertyunit not found');

            return redirect(route('propertyunits.index'));
        }

        return view('propertyunits.show')->with('propertyunit', $propertyunit);
    }

    /**
     * Show the form for editing the specified Propertyunit.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $propertyunit = $this->propertyunitRepository->findWithoutFail($id);

        if (empty($propertyunit)) {
            Flash::error('Propertyunit not found');

            return redirect(route('propertyunits.index'));
        }

        return view('propertyunits.edit')->with('propertyunit', $propertyunit);
    }

    /**
     * Update the specified Propertyunit in storage.
     *
     * @param  int              $id
     * @param UpdatePropertyunitRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePropertyunitRequest $request)
    {
        $propertyunit = $this->propertyunitRepository->findWithoutFail($id);

        if (empty($propertyunit)) {
            Flash::error('Propertyunit not found');

            return redirect(route('propertyunits.index'));
        }

        $propertyunit = $this->propertyunitRepository->update($request->all(), $id);

        Flash::success('Propertyunit updated successfully.');

        return redirect(route('propertyunits.index'));
    }

    /**
     * Remove the specified Propertyunit from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $propertyunit = $this->propertyunitRepository->findWithoutFail($id);

        if (empty($propertyunit)) {
            Flash::error('Propertyunit not found');

            return redirect(route('propertyunits.index'));
        }

        $this->propertyunitRepository->delete($id);

        Flash::success('Propertyunit deleted successfully.');

        return redirect(url('admin/properties'));
    }
}
