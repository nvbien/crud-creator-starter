<?php

namespace App\Policies;

use App\Models\Hotel;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class HotelPolicy extends BasePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the hotel.
     *
     * @param  \App\User  $user
     * @param  \App\Hotel  $hotel
     * @return mixed
     */
    public function view(User $user, Hotel $hotel)
    {
        //
        return ($user->hotels->where('id', $hotel->id)->count() >0);
    }

    /**
     * Determine whether the user can create hotels.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the hotel.
     *
     * @param  \App\User  $user
     * @param  \App\Hotel  $hotel
     * @return mixed
     */
    public function update(User $user, Hotel $hotel)
    {
        //
        return ($user->hotels->where('id', $hotel->id)->count() >0);
    }

    /**
     * Determine whether the user can delete the hotel.
     *
     * @param  \App\User  $user
     * @param  \App\Hotel  $hotel
     * @return mixed
     */
    public function delete(User $user, Hotel $hotel)
    {
        return ($user->hotels->where('id', $hotel->id)->count() >0);
    }
}
