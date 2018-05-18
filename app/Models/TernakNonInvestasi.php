<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TernakNonInvestasi
 * @package App\Models
 * @version May 16, 2018, 4:08 pm UTC
 *
 * @property \App\Models\Ternak ternak
 * @property \Illuminate\Database\Eloquent\Collection konfirmasiInvestors
 * @property \Illuminate\Database\Eloquent\Collection ternakInvestasis
 * @property \Illuminate\Database\Eloquent\Collection ternaks
 * @property \Illuminate\Database\Eloquent\Collection transaksiInvestasiHasStatusTransaksiInvestasis
 * @property \Illuminate\Database\Eloquent\Collection transaksiInvestasis
 * @property decimal massa_awal
 * @property integer ternaks_id
 */
class TernakNonInvestasi extends Model
{
    use SoftDeletes;

    public $table = 'ternak_non_investasis';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'massa_awal',
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
        return $this->belongsTo(\App\Models\Ternak::class,'ternaks_id');
    }
}
