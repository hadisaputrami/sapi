<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TransInvesHasStatusInves
 * @package App\Models
 * @version May 30, 2018, 11:08 pm UTC
 *
 * @property \App\Models\StatusTransaksiInvestasi statusTransaksiInvestasi
 * @property \App\Models\TransaksiInvestasi transaksiInvestasi
 * @property \Illuminate\Database\Eloquent\Collection konfirmasiInvestors
 * @property \Illuminate\Database\Eloquent\Collection ternakInvestasis
 * @property \Illuminate\Database\Eloquent\Collection ternaks
 * @property \Illuminate\Database\Eloquent\Collection transaksiInvestasis
 * @property integer transaksi_investasis_id
 * @property integer status_transaksi_investasis_id
 * @property integer users_id
 */
class TransInvesHasStatusInves extends Model
{
    use SoftDeletes;

    public $table = 'transaksi_investasi_has_status_transaksi_investasis';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'transaksi_investasis_id',
        'status_transaksi_investasis_id',
        'users_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'transaksi_investasis_id' => 'integer',
        'status_transaksi_investasis_id' => 'integer',
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
    public function statusTransaksiInvestasi()
    {
        return $this->belongsTo(\App\Models\StatusTransaksiInvestasi::class,'status_transaksi_investasis_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function transaksiInvestasi()
    {
        return $this->belongsTo(\App\Models\TransaksiInvestasi::class,'transaksi_investasis_id');
    }
}
