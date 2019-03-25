<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePropertyRequest;
use App\Http\Requests\UpdatePropertyRequest;
use App\Propertyunit;
use App\Repositories\PropertyRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Validation\Validator;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PropertyController extends AppBaseController
{
    /** @var  PropertyRepository */
    private $propertyRepository;

    public function __construct(PropertyRepository $propertyRepo)
    {
        $this->propertyRepository = $propertyRepo;
    }

    /**
     * Display a listing of the Property.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->propertyRepository->pushCriteria(new RequestCriteria($request));
        $properties = $this->propertyRepository->all();
            return view('properties.index',[
            'properties'=>$properties,
        ]);
    }
//    public function countHouses(){
//        $properties = Propertyunit::count();
//        return view('properties.index')->Properties($properties);
//    }

    /**
     * Show the form for creating a new Property.
     *
     * @return Response
     *
     */
    protected function validator(Request $request)
    {
        return Validator::make($request, [
            'name' => ['required'],
            'location' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'code' => ['required', 'string', 'min:6', 'confirmed'],
            'landlord' => ['required', 'string', 'min:6', 'confirmed'],
            'units' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }
    public function create()
    {
        return view('properties.create');
    }

    /**
     * Store a newly created Property in storage.
     *
     * @param CreatePropertyRequest $request
     *
     * @return Response
     */
    public function store(CreatePropertyRequest $request)
    {
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'name' => ['required'],
            'location' => ['required'],
            'code' => ['required'],
            'landlord' => ['required'],
            'units' => ['required'],

        ]);
        if ($validator->fails()) {
            return redirect('admin/properties/create')
                ->withErrors($validator)
                ->withInput();
        }

        $input = $request->all();

        $property = $this->propertyRepository->create($input);

        Flash::success('Property saved successfully.');

        return redirect(route('properties.index'));
    }

    /**
     * Display the specified Property.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $property = $this->propertyRepository->findWithoutFail($id);

        if (empty($property)) {
            Flash::error('Property not found');

            return redirect(route('properties.index'));
        }

        return view('properties.show')->with('property', $property);
    }

    /**
     * Show the form for editing the specified Property.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $property = $this->propertyRepository->findWithoutFail($id);

        if (empty($property)) {
            Flash::error('Property not found');

            return redirect(route('properties.index'));
        }

        return view('properties.edit')->with('property', $property);
    }

    /**
     * Update the specified Property in storage.
     *
     * @param  int              $id
     * @param UpdatePropertyRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePropertyRequest $request)
    {
        $property = $this->propertyRepository->findWithoutFail($id);

        if (empty($property)) {
            Flash::error('Property not found');

            return redirect(route('properties.index'));
        }

        $property = $this->propertyRepository->update($request->all(), $id);

        Flash::success('Property updated successfully.');

        return redirect(route('properties.index'));
    }

    /**
     * Remove the specified Property from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $property = $this->propertyRepository->findWithoutFail($id);

        if (empty($property)) {
            Flash::error('Property not found');

            return redirect(route('properties.index'));
        }

        $this->propertyRepository->delete($id);

        Flash::success('Property deleted successfully.');

        return redirect(route('properties.index'));
    }
}
