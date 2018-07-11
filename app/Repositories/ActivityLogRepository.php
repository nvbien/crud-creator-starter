<?php

namespace App\Repositories;

use App\Models\ActivityLog;
use InfyOm\Generator\Common\BaseRepository;

class ActivityLogRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'url',
        'route_name',
        'user_id',
        'post_data'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ActivityLog::class;
    }
}
