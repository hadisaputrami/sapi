<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use Notifiable;
    use EntrustUserTrait;
    //use SoftDeletes;

    public $table = 'users';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'email',
        'password',
        'remember_token',
        'verified',
        'verification_token',
        'device_token'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'password' => 'string',
        'remember_token' => 'string',
        'verified' => 'boolean',
        'verification_token' => 'string',
        'device_token' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function biodata()
    {
        return $this->belongsTo(\App\Models\Biodata::class);
    }

       public function investor()
    {
        return $this->hasOne(\App\Models\Investor::class,'users_id');
    }

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules_create = [
        'name' => 'required|string|max:255',
        'email' => 'string|email|max:255',
        'password' => 'required|string|min:6|confirmed',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules_update = [
        'name' => 'required|string|max:255',
        'email' => 'string|email|max:255',
        
    ];
}
