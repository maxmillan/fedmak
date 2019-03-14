<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePropertyspectRequest;
use App\Http\Requests\UpdatePropertyspectRequest;
use App\Repositories\PropertyspectRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PropertyspectController extends AppBaseController
{
    /** @var  PropertyspectRepository */
    private $propertyspectRepository;

    public function __construct(PropertyspectRepository $propertyspectRepo)
    {
        $this->propertyspectRepository = $propertyspectRepo;
    }

    /**
     * Display a listing of the Propertyspect.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->propertyspectRepository->pushCriteria(new RequestCriteria($request));
        $propertyspects = $this->propertyspectRepository->all();

        return view('propertyspects.index')
            ->with('propertyspects', $propertyspects);
    }

    /**
     * Show the form for creating a new Propertyspect.
     *
     * @return Response
     */
    public function create()
    {
        return view('propertyspects.create');
    }

    /**
     * Store a newly created Propertyspect in storage.
     *
     * @param CreatePropertyspectRequest $request
     *
     * @return Response
     */
    public function store(CreatePropertyspectRequest $request)
    {
        $input = $request->all();

        $propertyspect = $this->propertyspectRepository->create($input);

        Flash::success('Propertyspect saved successfully.');

        return redirect(route('propertyspects.index'));
    }

    /**
     * Display the specified Propertyspect.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $propertyspect = $this->propertyspectRepository->findWithoutFail($id);

        if (empty($propertyspect)) {
            Flash::error('Propertyspect not found');

            return redirect(route('propertyspects.index'));
        }

        return view('propertyspects.show')->with('propertyspect', $propertyspect);
    }

    /**
     * Show the form for editing the specified Propertyspect.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $propertyspect = $this->propertyspectRepository->findWithoutFail($id);

        if (empty($propertyspect)) {
            Flash::error('Propertyspect not found');

            return redirect(route('propertyspects.index'));
        }

        return view('propertyspects.edit')->with('propertyspect', $propertyspect);
    }

    /**
     * Update the specified Propertyspect in storage.
     *
     * @param  int              $id
     * @param UpdatePropertyspectRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePropertyspectRequest $request)
    {
        $propertyspect = $this->propertyspectRepository->findWithoutFail($id);

        if (empty($propertyspect)) {
            Flash::error('Propertyspect not found');

            return redirect(route('propertyspects.index'));
        }

        $propertyspect = $this->propertyspectRepository->update($request->all(), $id);

        Flash::success('Propertyspect updated successfully.');

        return redirect(route('propertyspects.index'));
    }

    /**
     * Remove the specified Propertyspect from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $propertyspect = $this->propertyspectRepository->findWithoutFail($id);

        if (empty($propertyspect)) {
            Flash::error('Propertyspect not found');

            return redirect(route('propertyspects.index'));
        }

        $this->propertyspectRepository->delete($id);

        Flash::success('Propertyspect deleted successfully.');

        return redirect(route('propertyspects.index'));
    }
}
