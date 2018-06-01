<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Progres
 * @package App\Models
 * @version May 30, 2018, 10:23 pm UTC
 *
 * @property \App\Models\TernakInvestasi ternakInvestasi
 * @property \Illuminate\Database\Eloquent\Collection konfirmasiInvestors
 * @property \Illuminate\Database\Eloquent\Collection ternakInvestasis
 * @property \Illuminate\Database\Eloquent\Collection ternaks
 * @property \Illuminate\Database\Eloquent\Collection transaksiInvestasiHasStatusTransaksiInvestasis
 * @property \Illuminate\Database\Eloquent\Collection transaksiInvestasis
 * @property string foto
 * @property string deskripsi
 * @property decimal berat
 * @property integer ternak_investasis_id
 */
class Progres extends Model
{
    use SoftDeletes;

    public $table = 'progress';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'foto',
        'deskripsi',
        'berat',
        'ternak_investasis_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'foto' => 'string',
        'deskripsi' => 'string',
        'ternak_investasis_id' => 'integer'
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
    public function ternakInvestasi()
    {
        return $this->belongsTo(\App\Models\TernakInvestasi::class,'ternak_investasis_id');
    }
}
