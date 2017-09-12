<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Ternak
 * @package App\Models
 * @version September 9, 2017, 2:48 pm UTC
 *
 * @property \App\Models\Peternak peternak
 * @property \Illuminate\Database\Eloquent\Collection biodatas
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property \Illuminate\Database\Eloquent\Collection TernakNonInvestasi
 * @property \Illuminate\Database\Eloquent\Collection TransaksiPenjualan
 * @property string kode
 * @property date dob
 * @property date tanggal_masuk
 * @property integer peternaks_id
 * @property integer jenis_ternaks_id
 */
class Ternak extends Model
{
    use SoftDeletes;

    public $table = 'ternaks';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'kode',
        'dob',
        'tanggal_masuk',
        'peternaks_id',
        'jenis_ternaks_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'kode' => 'string',
        'dob' => 'date',
        'tanggal_masuk' => 'date',
        'peternaks_id' => 'integer',
        'jenis_ternaks_id' => 'integer'
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
    public function peternak()
    {
        return $this->belongsTo(\App\Models\Peternak::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function ternakNonInvestasis()
    {
        return $this->hasMany(\App\Models\TernakNonInvestasi::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function transaksiPenjualans()
    {
        return $this->hasMany(\App\Models\TransaksiPenjualan::class);
    }
}
