<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Hotel
 * @package App\Models
 * @version July 13, 2018, 1:55 am UTC
 * @property integer user_id
 * @property integer hotel_id
 */
class UserHotel extends Model
{
    public $table = 'user_hotels';
    public $timestamps = false;
    public $fillable = [
        'user_id',
        'hotel_id',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'hotel_id' => 'integer',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
