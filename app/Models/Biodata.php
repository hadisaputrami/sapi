<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Biodata
 * @package App\Models
 * @version August 31, 2017, 6:30 am UTC
 *
 * @property \App\Models\Agama agama
 * @property \App\Models\User user
 * @property \Illuminate\Database\Eloquent\Collection ternaks
 * @property integer users_id
 * @property string nik
 * @property date tanggal_lahir
 * @property string jenis_kelamin
 * @property string status_perkawinan
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
        'nik',
        'tanggal_lahir',
        'jenis_kelamin',
        'status_perkawinan',
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
        'nik' => 'string',
        'tanggal_lahir' => 'date',
        'jenis_kelamin' => 'string',
        'status_perkawinan' => 'string',
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
