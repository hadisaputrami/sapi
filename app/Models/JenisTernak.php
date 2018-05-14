<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class JenisTernak
 * @package App\Models
 * @version May 14, 2018, 7:01 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection ternakInvestasis
 * @property \Illuminate\Database\Eloquent\Collection Ternak
 * @property \Illuminate\Database\Eloquent\Collection transaksiInvestasiHasStatusTransaksiInvestasis
 * @property \Illuminate\Database\Eloquent\Collection transaksiInvestasis
 * @property string jenis_ternak
 */
class JenisTernak extends Model
{
    use SoftDeletes;

    public $table = 'jenis_ternaks';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'jenis_ternak'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'jenis_ternak' => 'string'
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
    public function ternaks()
    {
        return $this->hasMany(\App\Models\Ternak::class);
    }
}
