<?php

namespace App\Repositories;

use App\Models\BusOperator;
use InfyOm\Generator\Common\BaseRepository;

class BusOperatorRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'code',
        'password',
        'address',
        'phone',
        'expired_date',
        'status',
        'user_id',
        'groups',
        'avatar',
        'email'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return BusOperator::class;
    }
}
