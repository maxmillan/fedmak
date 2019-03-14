<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePropertyunitattributeRequest;
use App\Http\Requests\UpdatePropertyunitattributeRequest;
use App\Repositories\PropertyunitattributeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PropertyunitattributeController extends AppBaseController
{
    /** @var  PropertyunitattributeRepository */
    private $propertyunitattributeRepository;

    public function __construct(PropertyunitattributeRepository $propertyunitattributeRepo)
    {
        $this->propertyunitattributeRepository = $propertyunitattributeRepo;
    }

    /**
     * Display a listing of the Propertyunitattribute.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->propertyunitattributeRepository->pushCriteria(new RequestCriteria($request));
        $propertyunitattributes = $this->propertyunitattributeRepository->all();

        return view('propertyunitattributes.index')
            ->with('propertyunitattributes', $propertyunitattributes);
    }

    /**
     * Show the form for creating a new Propertyunitattribute.
     *
     * @return Response
     */
    public function create()
    {
        return view('propertyunitattributes.create');
    }

    /**
     * Store a newly created Propertyunitattribute in storage.
     *
     * @param CreatePropertyunitattributeRequest $request
     *
     * @return Response
     */
    public function store(CreatePropertyunitattributeRequest $request)
    {
        $input = $request->all();

        $propertyunitattribute = $this->propertyunitattributeRepository->create($input);

        Flash::success('Propertyunitattribute saved successfully.');

        return redirect(route('propertyunitattributes.index'));
    }

    /**
     * Display the specified Propertyunitattribute.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $propertyunitattribute = $this->propertyunitattributeRepository->findWithoutFail($id);

        if (empty($propertyunitattribute)) {
            Flash::error('Propertyunitattribute not found');

            return redirect(route('propertyunitattributes.index'));
        }

        return view('propertyunitattributes.show')->with('propertyunitattribute', $propertyunitattribute);
    }

    /**
     * Show the form for editing the specified Propertyunitattribute.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $propertyunitattribute = $this->propertyunitattributeRepository->findWithoutFail($id);

        if (empty($propertyunitattribute)) {
            Flash::error('Propertyunitattribute not found');

            return redirect(route('propertyunitattributes.index'));
        }

        return view('propertyunitattributes.edit')->with('propertyunitattribute', $propertyunitattribute);
    }

    /**
     * Update the specified Propertyunitattribute in storage.
     *
     * @param  int              $id
     * @param UpdatePropertyunitattributeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePropertyunitattributeRequest $request)
    {
        $propertyunitattribute = $this->propertyunitattributeRepository->findWithoutFail($id);

        if (empty($propertyunitattribute)) {
            Flash::error('Propertyunitattribute not found');

            return redirect(route('propertyunitattributes.index'));
        }

        $propertyunitattribute = $this->propertyunitattributeRepository->update($request->all(), $id);

        Flash::success('Propertyunitattribute updated successfully.');

        return redirect(route('propertyunitattributes.index'));
    }

    /**
     * Remove the specified Propertyunitattribute from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $propertyunitattribute = $this->propertyunitattributeRepository->findWithoutFail($id);

        if (empty($propertyunitattribute)) {
            Flash::error('Propertyunitattribute not found');

            return redirect(route('propertyunitattributes.index'));
        }

        $this->propertyunitattributeRepository->delete($id);

        Flash::success('Propertyunitattribute deleted successfully.');

        return redirect(route('propertyunitattributes.index'));
    }
}
