<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TernakInvestasi
 * @package App\Models
 * @version May 15, 2018, 8:14 pm UTC
 *
 * @property \App\Models\Ternak ternak
 * @property \App\Models\TransaksiInvestasi transaksiInvestasi
 * @property \Illuminate\Database\Eloquent\Collection konfirmasiInvestors
 * @property \Illuminate\Database\Eloquent\Collection Progress
 * @property \Illuminate\Database\Eloquent\Collection ternaks
 * @property \Illuminate\Database\Eloquent\Collection transaksiInvestasiHasStatusTransaksiInvestasis
 * @property \Illuminate\Database\Eloquent\Collection transaksiInvestasis
 * @property integer ternaks_id
 * @property integer transaksi_investasis_id
 */
class TernakInvestasi extends Model
{
    use SoftDeletes;

    public $table = 'ternak_investasis';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'ternaks_id',
        'transaksi_investasis_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'ternaks_id' => 'integer',
        'transaksi_investasis_id' => 'integer'
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
        return $this->belongsTo(\App\Models\Ternak::class,'ternaks_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function transaksiInvestasi()
    {
        return $this->belongsTo(\App\Models\TransaksiInvestasi::class,'transaksi_investasis_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function progresses()
    {
        return $this->hasMany(\App\Models\Progress::class);
    }
}
