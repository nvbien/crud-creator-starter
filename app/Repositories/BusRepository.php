<?php

namespace App\Repositories;

use App\Models\Bus;
use InfyOm\Generator\Common\BaseRepository;

class BusRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'code',
        'license_plate',
        'model',
        'capacity',
        'bus_type_id',
        'status',
        'avatar',
        'company_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Bus::class;
    }
}
