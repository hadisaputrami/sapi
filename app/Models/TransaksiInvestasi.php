<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TransaksiInvestasi
 * @package App\Models
 * @version May 9, 2018, 6:55 pm UTC
 *
 * @property \App\Models\PaketInvestasi paketInvestasi
 * @property \App\Models\TernakInvestasi ternakInvestasi
 * @property \Illuminate\Database\Eloquent\Collection InvestorHasTransaksiInvestasi
 * @property \Illuminate\Database\Eloquent\Collection ternakInvestasis
 * @property \Illuminate\Database\Eloquent\Collection TransaksiInvestasiHasStatusTransaksiInvestasi
 * @property string kode_transaksi
 * @property integer paket_investasis_id
 * @property integer ternak_investasis_id
 * @property integer asuransis_id
 */
class TransaksiInvestasi extends Model
{
    use SoftDeletes;

    public $table = 'transaksi_investasis';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'kode_transaksi',
        'paket_investasis_id',
        'ternak_investasis_id',
        'asuransis_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'kode_transaksi' => 'string',
        'paket_investasis_id' => 'integer',
        'ternak_investasis_id' => 'integer',
        'asuransis_id' => 'integer'
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
    public function paketInvestasi()
    {
        return $this->belongsTo(\App\Models\PaketInvestasi::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function ternakInvestasi()
    {
        return $this->belongsTo(\App\Models\TernakInvestasi::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function investorHasTransaksiInvestasis()
    {
        return $this->hasMany(\App\Models\InvestorHasTransaksiInvestasi::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function transaksiInvestasiHasStatusTransaksiInvestasis()
    {
        return $this->hasMany(\App\Models\TransaksiInvestasiHasStatusTransaksiInvestasi::class);
    }
}
