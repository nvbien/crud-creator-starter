<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Hotel
 * @package App\Models
 * @version July 13, 2018, 1:55 am UTC
 */
class Hotel extends Model
{
    use SoftDeletes;

    public $table = 'hotels';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'code',
        'name',
        'address',
        'email',
        'phone',
        'remarks',
        'status',
        'limit_members'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'code' => 'string',
        'name' => 'string',
        'address' => 'string',
        'email' => 'string',
        'phone' => 'string',
        'remarks' => 'string',
        'status' => 'string',
        'limit_members' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
