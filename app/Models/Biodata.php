<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Biodata
 * @package App\Models
 * @version May 4, 2018, 11:28 pm UTC
 *
 * @property \App\Models\Agama agama
 * @property \Illuminate\Database\Eloquent\Collection ternakInvestasis
 * @property \Illuminate\Database\Eloquent\Collection ternaks
 * @property \Illuminate\Database\Eloquent\Collection transaksiInvestasiHasStatusTransaksiInvestasis
 * @property integer users_id
 * @property date tanggal_lahir
 * @property string jenis_kelamin
 * @property string pendidikan_terakhir
 * @property integer agama_id
 * @property string foto
 * @property string kontak
 */
class Biodata extends Model
{
    use SoftDeletes;

    public $table = 'biodatas';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'users_id',
        'tanggal_lahir',
        'jenis_kelamin',
        'pendidikan_terakhir',
        'agama_id',
        'foto',
        'kontak'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'users_id' => 'integer',
        'tanggal_lahir' => 'date',
        'jenis_kelamin' => 'string',
        'pendidikan_terakhir' => 'string',
        'agama_id' => 'integer',
        'foto' => 'string',
        'kontak' => 'string'
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
    public function agama()
    {
        return $this->belongsTo(\App\Models\Agama::class);
    }
}
