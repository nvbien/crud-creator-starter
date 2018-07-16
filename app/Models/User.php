<?php
    
    namespace App\Models;
    
    use App\User as BaseUser;
    use Illuminate\Notifications\Notifiable;
    
    /**
     * Class User
     * @package App\Models
     * @version January 5, 2018, 3:37 am UTC
     *
     * @property string name
     * @property string email
     * @property string password
     * @property string permissions
     * @property string remember_token
     * @property integer role_id
     */
    class User extends BaseUser {
        
        public $table = 'users';
        
        const CREATED_AT = 'created_at';
        const UPDATED_AT = 'updated_at';
        
        use Notifiable;
        public $fillable = [
            'name',
            'email',
            'password',
            'permissions',
            'remember_token',
            'role_id',
            'avatar',
        ];
        
        /**
         * The attributes that should be casted to native types.
         *
         * @var array
         */
        protected $casts = [
            'id'             => 'integer',
            'name'           => 'string',
            'email'          => 'string',
            'password'       => 'string',
            'permissions'    => 'string',
            'remember_token' => 'string',
            'role_id'        => 'integer',
            'avatar'         => 'string',
        ];
        
        /**
         * Validation rules
         *
         * @var array
         */
        public static $rules = [
            'email' => 'string|max:255|unique:users,email',
        ];
        /**
         * Get the comments for the blog post.
         */
        public function hotels() {
            return $this->hasManyThrough( Hotel::class, UserHotel::class, 'user_id','id','id', 'hotel_id' );
        }
        /**
         * Get the comments for the blog post.
         */
        public function isSuperAdmin() {
            return $this->is_super_admin;
        }
    }
