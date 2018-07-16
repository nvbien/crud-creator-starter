<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class BusOperator
 * @package App\Models
 * @version July 13, 2018, 7:15 am UTC
 */
class BusOperator extends Model
{
    use SoftDeletes;

    public $table = 'bus_operators';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'code' => 'string',
        'password' => 'string',
        'address' => 'string',
        'phone' => 'string',
        'status' => 'string',
        'user_id' => 'string',
        'groups' => 'string',
        'avatar' => 'string',
        'email' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
