<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TransaksiPenjualan
 * @package App\Models
 * @version September 2, 2017, 2:07 am UTC
 *
 * @property \App\Models\Ternak ternak
 * @property \Illuminate\Database\Eloquent\Collection biodatas
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property \Illuminate\Database\Eloquent\Collection ternaks
 * @property \App\Models\TransaksiPenjualansHasStatusPenjualan transaksiPenjualansHasStatusPenjualan
 * @property integer ternaks_id
 */
class TransaksiPenjualan extends Model
{
    use SoftDeletes;

    public $table = 'transaksi_penjualans';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'ternaks_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'ternaks_id' => 'integer'
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
    public function ternak()
    {
        return $this->belongsTo(\App\Models\Ternak::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function transaksiPenjualansHasStatusPenjualan()
    {
        return $this->hasOne(\App\Models\TransaksiPenjualansHasStatusPenjualan::class);
    }
}
