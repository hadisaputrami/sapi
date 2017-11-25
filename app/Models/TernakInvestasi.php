<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TernakInvestasi
 * @package App\Models
 * @version November 24, 2017, 9:26 am UTC
 *
 * @property \App\Models\PaketInvestasi paketInvestasi
 * @property \App\Models\Ternak ternak
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection Progress
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property \Illuminate\Database\Eloquent\Collection ternaks
 * @property \Illuminate\Database\Eloquent\Collection TransaksiInvestasi
 * @property integer ternaks_id
 * @property integer paket_investasis_id
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
        'paket_investasis_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'ternaks_id' => 'integer',
        'paket_investasis_id' => 'integer'
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
    public function paketInvestasi()
    {
        return $this->belongsTo(\App\Models\PaketInvestasi::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function ternak()
    {
        return $this->belongsTo(\App\Models\Ternak::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function progresses()
    {
        return $this->hasMany(\App\Models\Progres::class,'ternak_investasis_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function transaksiInvestasis()
    {
        return $this->hasMany(\App\Models\TransaksiInvestasi::class);
    }
}
