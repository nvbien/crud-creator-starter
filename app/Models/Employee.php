<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Employee
 * @package App\Models
 * @version July 13, 2018, 6:51 am UTC
 */
class Employee extends Model
{
    use SoftDeletes;

    public $table = 'employees';
    
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
        'email',
        'is_super'
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
        'email' => 'string',
        'is_super' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
