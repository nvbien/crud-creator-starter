<?php

namespace App\Repositories;

use App\Models\BusDriver;
use InfyOm\Generator\Common\BaseRepository;

class BusDriverRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'bus_id',
        'driver_id',
        'start_date',
        'end_date'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return BusDriver::class;
    }
}
