<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class KonfirmasiInvestor
 * @package App\Models
 * @version May 4, 2018, 11:30 pm UTC
 *
 * @property \App\Models\Investor investor
 * @property \Illuminate\Database\Eloquent\Collection ternakInvestasis
 * @property \Illuminate\Database\Eloquent\Collection ternaks
 * @property \Illuminate\Database\Eloquent\Collection transaksiInvestasiHasStatusTransaksiInvestasis
 * @property string status_konfirmasi
 * @property integer investors_id
 */
class KonfirmasiInvestor extends Model
{
    use SoftDeletes;

    public $table = 'konfirmasi_investors';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'status_konfirmasi',
        'investors_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'status_konfirmasi' => 'string',
        'investors_id' => 'integer'
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
}
