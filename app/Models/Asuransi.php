<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Asuransi
 * @package App\Models
 * @version May 14, 2018, 4:29 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection ternakInvestasis
 * @property \Illuminate\Database\Eloquent\Collection ternaks
 * @property \Illuminate\Database\Eloquent\Collection transaksiInvestasiHasStatusTransaksiInvestasis
 * @property \Illuminate\Database\Eloquent\Collection TransaksiInvestasi
 * @property decimal premi
 * @property string nomor_polis
 * @property string nama_penjamin
 */
class Asuransi extends Model
{
    use SoftDeletes;

    public $table = 'asuransis';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'premi',
        'nomor_polis',
        'nama_penjamin'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nomor_polis' => 'string',
        'nama_penjamin' => 'string'
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
    public function transaksiInvestasis()
    {
        return $this->hasMany(\App\Models\TransaksiInvestasi::class);
    }
}
