<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BasePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the hotel.
     *
     * @param  \App\User  $user
     * @param  \App\Hotel  $hotel
     * @return mixed
     */
    public function before(User $user, $ability)
    {
        //
        if ($user->isSuperAdmin()) {
            return true;
        }
    }

}
