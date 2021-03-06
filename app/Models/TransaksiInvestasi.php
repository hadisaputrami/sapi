<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TransaksiInvestasi
 * @package App\Models
 * @version May 14, 2018, 4:24 pm UTC
 *
 * @property \App\Models\Asuransi asuransi
 * @property \App\Models\PaketInvestasi paketInvestasi
 * @property \Illuminate\Database\Eloquent\Collection InvestorHasTransaksiInvestasi
 * @property \Illuminate\Database\Eloquent\Collection TernakInvestasi
 * @property \Illuminate\Database\Eloquent\Collection ternaks
 * @property \Illuminate\Database\Eloquent\Collection TransaksiInvestasiHasStatusTransaksiInvestasi
 * @property string kode_transaksi
 * @property integer paket_investasis_id
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
    public function asuransi()
    {
        return $this->belongsTo(\App\Models\Asuransi::class,'asuransis_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function paketInvestasi()
    {
        return $this->belongsTo(\App\Models\PaketInvestasi::class,'paket_investasis_id');
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
    public function ternakInvestasis()
    {
        return $this->hasMany(\App\Models\TernakInvestasi::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function transaksiInvestasiHasStatusTransaksiInvestasis()
    {
        return $this->hasMany(\App\Models\TransaksiInvestasiHasStatusTransaksiInvestasi::class);
    }

    public function investors()
    {
        return$this->belongsToMany(\App\Models\Investor::class);
    }
}
