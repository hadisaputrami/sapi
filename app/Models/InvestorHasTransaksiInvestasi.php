<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class InvestorHasTransaksiInvestasi
 * @package App\Models
 * @version May 11, 2018, 10:32 pm UTC
 *
 * @property \App\Models\Investor investor
 * @property \App\Models\TransaksiInvestasi transaksiInvestasi
 * @property \App\Models\JenisPembayaran jenisPembayaran
 * @property \Illuminate\Database\Eloquent\Collection ternaks
 * @property \Illuminate\Database\Eloquent\Collection transaksiInvestasiHasStatusTransaksiInvestasis
 * @property \Illuminate\Database\Eloquent\Collection transaksiInvestasis
 * @property integer transaksi_investasis_id
 * @property string nominal_investasi
 * @property string scan_bukti_pembayaran
 * @property integer jenis_pembayarans_id
 * @property string jumlah_sapi
 */
class InvestorHasTransaksiInvestasi extends Model
{
    use SoftDeletes;

    public $table = 'investor_has_transaksi_investasis';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'transaksi_investasis_id',
        'nominal_investasi',
        'scan_bukti_pembayaran',
        'jenis_pembayarans_id',
        'jumlah_sapi'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'investors_id' => 'integer',
        'transaksi_investasis_id' => 'integer',
        'nominal_investasi' => 'string',
        'scan_bukti_pembayaran' => 'string',
        'jenis_pembayarans_id' => 'integer',
        'jumlah_sapi' => 'string'
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
    public function investor()
    {
        return $this->belongsTo(\App\Models\Investor::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function transaksiInvestasi()
    {
        return $this->belongsTo(\App\Models\TransaksiInvestasi::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function jenisPembayaran()
    {
        return $this->belongsTo(\App\Models\JenisPembayaran::class);
    }
}
