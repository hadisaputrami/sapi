<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class KonfirmasiInvestor
 * @package App\Models
 * @version May 15, 2018, 7:18 pm UTC
 *
 * @property \App\Models\Investor investor
 * @property \App\Models\StatusKonfirmasi statusKonfirmasi
 * @property \Illuminate\Database\Eloquent\Collection ternakInvestasis
 * @property \Illuminate\Database\Eloquent\Collection ternaks
 * @property \Illuminate\Database\Eloquent\Collection transaksiInvestasiHasStatusTransaksiInvestasis
 * @property \Illuminate\Database\Eloquent\Collection transaksiInvestasis
 * @property integer status_konfirmasis_id
 * @property integer investors_id
 * @property string bank_pengirim
 * @property string bank_tujuan
 * @property integer nominal
 * @property string nama_pengirim
 */
class KonfirmasiInvestor extends Model
{
    use SoftDeletes;

    public $table = 'konfirmasi_investors';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'status_konfirmasis_id',
        'investors_id',
        'bank_pengirim',
        'bank_tujuan',
        'nominal',
        'nama_pengirim'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'status_konfirmasis_id' => 'integer',
        'investors_id' => 'integer',
        'bank_pengirim' => 'string',
        'bank_tujuan' => 'string',
        'nominal' => 'integer',
        'nama_pengirim' => 'string'
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
        return $this->belongsTo(\App\Models\Investor::class,'investors_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function statusKonfirmasi()
    {
        return $this->belongsTo(\App\Models\StatusKonfirmasi::class,'status_konfirmasis_id');
    }
}
