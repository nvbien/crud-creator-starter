<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Bus
 * @package App\Models
 * @version July 13, 2018, 7:15 am UTC
 */
class Bus extends Model
{
    use SoftDeletes;

    public $table = 'bus';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'code' => 'string',
        'license_plate' => 'string',
        'model' => 'string',
        'capacity' => 'integer',
        'bus_type_id' => 'integer',
        'status' => 'string',
        'avatar' => 'string',
        'company_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
