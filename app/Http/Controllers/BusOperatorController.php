<?php

namespace App\Http\Controllers;

use App\DataTables\BusOperatorDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateBusOperatorRequest;
use App\Http\Requests\UpdateBusOperatorRequest;
use App\Repositories\BusOperatorRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class BusOperatorController extends AppBaseController
{
    /** @var  BusOperatorRepository */
    private $busOperatorRepository;

    public function __construct(BusOperatorRepository $busOperatorRepo)
    {
        $this->busOperatorRepository = $busOperatorRepo;
    }

    /**
     * Display a listing of the BusOperator.
     *
     * @param BusOperatorDataTable $busOperatorDataTable
     * @return Response
     */
    public function index(BusOperatorDataTable $busOperatorDataTable)
    {
        return $busOperatorDataTable->render('bus_operators.index');
    }

    /**
     * Show the form for creating a new BusOperator.
     *
     * @return Response
     */
    public function create()
    {
        return view('bus_operators.create');
    }

    /**
     * Store a newly created BusOperator in storage.
     *
     * @param CreateBusOperatorRequest $request
     *
     * @return Response
     */
    public function store(CreateBusOperatorRequest $request)
    {
        $input = $request->all();

        $busOperator = $this->busOperatorRepository->create($input);

        Flash::success('Bus Operator saved successfully.');

        return redirect(route('busOperators.index'));
    }

    /**
     * Display the specified BusOperator.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $busOperator = $this->busOperatorRepository->findWithoutFail($id);

        if (empty($busOperator)) {
            Flash::error('Bus Operator not found');

            return redirect(route('busOperators.index'));
        }

        return view('bus_operators.show')->with('busOperator', $busOperator);
    }

    /**
     * Show the form for editing the specified BusOperator.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $busOperator = $this->busOperatorRepository->findWithoutFail($id);

        if (empty($busOperator)) {
            Flash::error('Bus Operator not found');

            return redirect(route('busOperators.index'));
        }

        return view('bus_operators.edit')->with('busOperator', $busOperator);
    }

    /**
     * Update the specified BusOperator in storage.
     *
     * @param  int              $id
     * @param UpdateBusOperatorRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBusOperatorRequest $request)
    {
        $busOperator = $this->busOperatorRepository->findWithoutFail($id);

        if (empty($busOperator)) {
            Flash::error('Bus Operator not found');

            return redirect(route('busOperators.index'));
        }

        $busOperator = $this->busOperatorRepository->update($request->all(), $id);

        Flash::success('Bus Operator updated successfully.');

        return redirect(route('busOperators.index'));
    }

    /**
     * Remove the specified BusOperator from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $busOperator = $this->busOperatorRepository->findWithoutFail($id);

        if (empty($busOperator)) {
            Flash::error('Bus Operator not found');

            return redirect(route('busOperators.index'));
        }

        $this->busOperatorRepository->delete($id);

        Flash::success('Bus Operator deleted successfully.');

        return redirect(route('busOperators.index'));
    }
}
