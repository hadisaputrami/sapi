<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class JenisPembayaran
 * @package App\Models
 * @version May 14, 2018, 4:37 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection InvestorHasTransaksiInvestasi
 * @property \Illuminate\Database\Eloquent\Collection ternakInvestasis
 * @property \Illuminate\Database\Eloquent\Collection ternaks
 * @property \Illuminate\Database\Eloquent\Collection transaksiInvestasiHasStatusTransaksiInvestasis
 * @property \Illuminate\Database\Eloquent\Collection transaksiInvestasis
 * @property \Illuminate\Database\Eloquent\Collection TransaksiPenjualansHasStatusPenjualan
 * @property string nama
 * @property string keterangan
 */
class JenisPembayaran extends Model
{
    use SoftDeletes;

    public $table = 'jenis_pembayarans';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nama',
        'keterangan'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nama' => 'string',
        'keterangan' => 'string'
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
    public function investorHasTransaksiInvestasis()
    {
        return $this->hasMany(\App\Models\InvestorHasTransaksiInvestasi::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function transaksiPenjualansHasStatusPenjualans()
    {
        return $this->hasMany(\App\Models\TransaksiPenjualansHasStatusPenjualan::class);
    }
}
