<?php

namespace App\Http\Controllers;

use App\DataTables\BusDriverDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateBusDriverRequest;
use App\Http\Requests\UpdateBusDriverRequest;
use App\Repositories\BusDriverRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class BusDriverController extends AppBaseController
{
    /** @var  BusDriverRepository */
    private $busDriverRepository;

    public function __construct(BusDriverRepository $busDriverRepo)
    {
        $this->busDriverRepository = $busDriverRepo;
    }

    /**
     * Display a listing of the BusDriver.
     *
     * @param BusDriverDataTable $busDriverDataTable
     * @return Response
     */
    public function index(BusDriverDataTable $busDriverDataTable)
    {
        return $busDriverDataTable->render('bus_drivers.index');
    }

    /**
     * Show the form for creating a new BusDriver.
     *
     * @return Response
     */
    public function create()
    {
        return view('bus_drivers.create');
    }

    /**
     * Store a newly created BusDriver in storage.
     *
     * @param CreateBusDriverRequest $request
     *
     * @return Response
     */
    public function store(CreateBusDriverRequest $request)
    {
        $input = $request->all();

        $busDriver = $this->busDriverRepository->create($input);

        Flash::success('Bus Driver saved successfully.');

        return redirect(route('busDrivers.index'));
    }

    /**
     * Display the specified BusDriver.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $busDriver = $this->busDriverRepository->findWithoutFail($id);

        if (empty($busDriver)) {
            Flash::error('Bus Driver not found');

            return redirect(route('busDrivers.index'));
        }

        return view('bus_drivers.show')->with('busDriver', $busDriver);
    }

    /**
     * Show the form for editing the specified BusDriver.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $busDriver = $this->busDriverRepository->findWithoutFail($id);

        if (empty($busDriver)) {
            Flash::error('Bus Driver not found');

            return redirect(route('busDrivers.index'));
        }

        return view('bus_drivers.edit')->with('busDriver', $busDriver);
    }

    /**
     * Update the specified BusDriver in storage.
     *
     * @param  int              $id
     * @param UpdateBusDriverRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBusDriverRequest $request)
    {
        $busDriver = $this->busDriverRepository->findWithoutFail($id);

        if (empty($busDriver)) {
            Flash::error('Bus Driver not found');

            return redirect(route('busDrivers.index'));
        }

        $busDriver = $this->busDriverRepository->update($request->all(), $id);

        Flash::success('Bus Driver updated successfully.');

        return redirect(route('busDrivers.index'));
    }

    /**
     * Remove the specified BusDriver from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $busDriver = $this->busDriverRepository->findWithoutFail($id);

        if (empty($busDriver)) {
            Flash::error('Bus Driver not found');

            return redirect(route('busDrivers.index'));
        }

        $this->busDriverRepository->delete($id);

        Flash::success('Bus Driver deleted successfully.');

        return redirect(route('busDrivers.index'));
    }
}
