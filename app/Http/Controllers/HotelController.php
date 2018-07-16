<?php

namespace App\Http\Controllers;

use App\DataTables\HotelDataTable;
use App\DataTables\HotelUserDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateHotelRequest;
use App\Http\Requests\UpdateHotelRequest;
use App\Models\Hotel;
use App\Models\UserHotel;
use App\Repositories\HotelRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Response;

class HotelController extends AppBaseController
{
    /** @var  HotelRepository */
    private $hotelRepository;

    public function __construct(HotelRepository $hotelRepo)
    {
        $this->hotelRepository = $hotelRepo;
    }

    /**
     * Display a listing of the Hotel.
     *
     * @param HotelDataTable $hotelDataTable
     * @return Response
     */
    public function index(HotelDataTable $hotelDataTable)
    {
        return $hotelDataTable->render('hotels.index');
    }

    /**
     * Show the form for creating a new Hotel.
     *
     * @return Response
     */
    public function create()
    {
        return view('hotels.create');
    }

    /**
     * Store a newly created Hotel in storage.
     *
     * @param CreateHotelRequest $request
     *
     * @return Response
     */
    public function store(CreateHotelRequest $request)
    {
        $input = $request->all();

        $hotel = $this->hotelRepository->create($input);

        Flash::success('Hotel saved successfully.');

        return redirect(route('hotels.index'));
    }

    /**
     * Display the specified Hotel.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show(Hotel $hotel)
    {
        $hotelUserDataTable = new HotelUserDataTable($hotel->id);

        if (empty($hotel)) {
            Flash::error('Hotel not found');
            return redirect(route('hotels.index'));
        }

        return $hotelUserDataTable->render('hotels.show', ['hotel'=> $hotel]);
    }

    public function setAdmin($id, Request $request)
    {
        $hotel = $this->hotelRepository->findWithoutFail($id);
        if (empty($hotel)) {
            Flash::error('Hotel not found');
            return response()->json(['success'=>false]);
        }
        $user_id = $request->get('user_id', 0);
        $status = $request->get('status', 'false');
        $query = UserHotel::where('user_id', $user_id)->where('hotel_id', $id);
        if($status == 'false'){
            UserHotel::where('user_id', $user_id)->where('hotel_id', $id)->delete();
        }
        else{
            $uh = $query->first();
            if(!$uh){
                $uh  = new UserHotel();
                $uh->user_id = $user_id;
                $uh->hotel_id = $id;
                $uh->save();
            }
        }
        return response()->json(['success'=>true]);
    }

    /**
     * Show the form for editing the specified Hotel.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $hotel = $this->hotelRepository->findWithoutFail($id);

        if (empty($hotel)) {
            Flash::error('Hotel not found');

            return redirect(route('hotels.index'));
        }

        return view('hotels.edit')->with('hotel', $hotel);
    }

    /**
     * Update the specified Hotel in storage.
     *
     * @param  int              $id
     * @param UpdateHotelRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateHotelRequest $request)
    {
        $hotel = $this->hotelRepository->findWithoutFail($id);

        if (empty($hotel)) {
            Flash::error('Hotel not found');

            return redirect(route('hotels.index'));
        }

        $hotel = $this->hotelRepository->update($request->all(), $id);

        Flash::success('Hotel updated successfully.');

        return redirect(route('hotels.index'));
    }

    /**
     * Remove the specified Hotel from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $hotel = $this->hotelRepository->findWithoutFail($id);

        if (empty($hotel)) {
            Flash::error('Hotel not found');

            return redirect(route('hotels.index'));
        }

        $this->hotelRepository->delete($id);

        Flash::success('Hotel deleted successfully.');

        return redirect(route('hotels.index'));
    }
}
