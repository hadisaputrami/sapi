<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class PaketInvestasi
 * @package App\Models
 * @version May 7, 2018, 9:05 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection TernakInvestasi
 * @property \Illuminate\Database\Eloquent\Collection ternaks
 * @property \Illuminate\Database\Eloquent\Collection transaksiInvestasiHasStatusTransaksiInvestasis
 * @property \Illuminate\Database\Eloquent\Collection TransaksiInvestasi
 * @property string nama
 * @property string harga
 * @property string massa
 * @property string lama_kontrak
 * @property string deskripsi
 * @property integer return
 */
class PaketInvestasi extends Model
{
    use SoftDeletes;

    public $table = 'paket_investasis';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nama',
        'harga',
        'massa',
        'lama_kontrak',
        'deskripsi',
        'return'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nama' => 'string',
        'harga' => 'string',
        'massa' => 'string',
        'lama_kontrak' => 'string',
        'deskripsi' => 'string',
        'return' => 'integer'
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
    public function ternakInvestasis()
    {
        return $this->hasMany(\App\Models\TernakInvestasi::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function transaksiInvestasis()
    {
        return $this->hasMany(\App\Models\TransaksiInvestasi::class);
    }
}
