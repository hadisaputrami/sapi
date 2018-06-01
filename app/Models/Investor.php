<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Investor
 * @package App\Models
 * @version September 10, 2017, 9:34 am UTC
 *
 * @property \App\User user
 * @property \Illuminate\Database\Eloquent\Collection biodatas
 * @property \App\Models\InvestorHasTransaksiInvestasi investorHasTransaksiInvestasi
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property \Illuminate\Database\Eloquent\Collection ternakInvestasis
 * @property \Illuminate\Database\Eloquent\Collection ternaks
 * @property string|\Carbon\Carbon update_at
 * @property string nama_pemilik_rek
 * @property string nama_bank
 * @property string no_rek
 * @property integer users_id
 */
class Investor extends Model
{
    use SoftDeletes;

    public $table = 'investors';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nama_pemilik_rek',
        'nama_bank',
        'no_rek',
        'users_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nama_pemilik_rek' => 'string',
        'nama_bank' => 'string',
        'no_rek' => 'string',
        'users_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\User::class,'users_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function investorHasTransaksiInvestasi()
    {
        return $this->hasOne(\App\Models\InvestorHasTransaksiInvestasi::class);
    }

    public function transaksiInvestasis()
    {
        return$this->belongsToMany(\App\Models\TransaksiInvestasi::class);
    }
}
