<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TransaksiPenjualanHasStatusPenjualan
 * @package App\Models
 * @version May 31, 2018, 1:46 am UTC
 *
 * @property \App\Models\JenisPembayaran jenisPembayaran
 * @property \App\Models\StatusPenjualan statusPenjualan
 * @property \App\Models\TransaksiPenjualan transaksiPenjualan
 * @property \Illuminate\Database\Eloquent\Collection konfirmasiInvestors
 * @property \Illuminate\Database\Eloquent\Collection ternakInvestasis
 * @property \Illuminate\Database\Eloquent\Collection ternaks
 * @property \Illuminate\Database\Eloquent\Collection transaksiInvestasiHasStatusTransaksiInvestasis
 * @property \Illuminate\Database\Eloquent\Collection transaksiInvestasis
 * @property integer transaksi_penjualans_id
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
        'transaksi_penjualans_id',
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
        'id' => 'integer',
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
        return $this->belongsTo(\App\Models\JenisPembayaran::class,'jenis_pembayarans_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function statusPenjualan()
    {
        return $this->belongsTo(\App\Models\StatusPenjualan::class,'status_penjualans_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function transaksiPenjualan()
    {
        return $this->belongsTo(\App\Models\TransaksiPenjualan::class,'transaksi_penjualans_id');
    }
}
