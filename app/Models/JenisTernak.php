<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class JenisTernak
 * @package App\Models
 * @version October 28, 2017, 4:53 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection biodatas
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property \Illuminate\Database\Eloquent\Collection ternakInvestasis
 * @property \Illuminate\Database\Eloquent\Collection Ternak
 * @property string nama_jenis_ternaks
 */
class JenisTernak extends Model
{
    use SoftDeletes;

    public $table = 'jenis_ternaks';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nama_jenis_ternaks'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nama_jenis_ternaks' => 'string'
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
