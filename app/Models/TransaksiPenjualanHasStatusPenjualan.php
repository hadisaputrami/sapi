<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TransaksiPenjualanHasStatusPenjualan
 * @package App\Models
 * @version May 11, 2018, 11:45 pm UTC
 *
 * @property \App\Models\JenisPembayaran jenisPembayaran
 * @property \App\Models\StatusPenjualan statusPenjualan
 * @property \App\Models\TransaksiPenjualan transaksiPenjualan
 * @property \Illuminate\Database\Eloquent\Collection ternakInvestasis
 * @property \Illuminate\Database\Eloquent\Collection ternaks
 * @property \Illuminate\Database\Eloquent\Collection transaksiInvestasiHasStatusTransaksiInvestasis
 * @property \Illuminate\Database\Eloquent\Collection transaksiInvestasis
 * @property integer status_penjualans_id
 * @property integer users_id
 * @property integer jenis_pembayarans_id
 */
class TransaksiPenjualanHasStatusPenjualan extends Model
{
    use SoftDeletes;

    public $table = 'transaksi_penjualans_has_status_penjualans';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'status_penjualans_id',
        'users_id',
        'jenis_pembayarans_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'transaksi_penjualans_id' => 'integer',
        'status_penjualans_id' => 'integer',
        'users_id' => 'integer',
        'jenis_pembayarans_id' => 'integer'
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
    public function jenisPembayaran()
    {
        return $this->belongsTo(\App\Models\JenisPembayaran::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function statusPenjualan()
    {
        return $this->belongsTo(\App\Models\StatusPenjualan::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function transaksiPenjualan()
    {
        return $this->belongsTo(\App\Models\TransaksiPenjualan::class);
    }
}
