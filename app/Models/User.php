<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class User
 * @package App\Models
 * @version September 12, 2017, 5:34 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection Admin
 * @property \Illuminate\Database\Eloquent\Collection Biodata
 * @property \Illuminate\Database\Eloquent\Collection DataUsaha
 * @property \Illuminate\Database\Eloquent\Collection Investor
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection Peternak
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property \Illuminate\Database\Eloquent\Collection ternakInvestasis
 * @property \Illuminate\Database\Eloquent\Collection ternaks
 * @property \Illuminate\Database\Eloquent\Collection TransaksiInvestasiHasStatusTransaksiInvestasi
 * @property \Illuminate\Database\Eloquent\Collection TransaksiPenjualansHasStatusPenjualan
 * @property string name
 * @property string email
 * @property string password
 * @property string remember_token
 * @property boolean verified
 * @property string verification_token
 */
class User extends Model
{
    use SoftDeletes;

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
        'verification_token'
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
        'verification_token' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function admins()
    {
        return $this->hasMany(\App\Models\Admin::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function biodatas()
    {
        return $this->hasMany(\App\Models\Biodata::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function dataUsahas()
    {
        return $this->hasMany(\App\Models\DataUsaha::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function investors()
    {
        return $this->hasMany(\App\Models\Investor::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function peternaks()
    {
        return $this->hasMany(\App\Models\Peternak::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function roles()
    {
        return $this->belongsToMany(\App\Models\Role::class, 'role_user');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function transaksiInvestasiHasStatusTransaksiInvestasis()
    {
        return $this->hasMany(\App\Models\TransaksiInvestasiHasStatusTransaksiInvestasi::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function transaksiPenjualansHasStatusPenjualans()
    {
        return $this->hasMany(\App\Models\TransaksiPenjualansHasStatusPenjualan::class);
    }
}
