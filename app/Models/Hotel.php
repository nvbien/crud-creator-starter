<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

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

    /**
     * Get the comments for the blog post.
     */
    public function admins() {
        return $this->hasManyThrough( User::class, UserHotel::class, 'hotel_id' ,'user_id');
    }

    /**
     * Get the comments for the blog post.
     */
    public function admin_hotels() {
        return $this->hasMany( UserHotel::class);
    }
    /**
     * Get the comments for the blog post.
     */
    public function employees() {
        return $this->hasMany( Employee::class);
    }

    public static function query(){
        $query = parent::query();
        $query->join('user_hotels','hotels.id','user_hotels.hotel_id')->where('user_id', Auth::id())->select('hotels.*');
        return $query;
    }
    
}
