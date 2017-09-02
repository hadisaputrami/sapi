<?php

namespace App\Repositories;

use App\Models\Ternak;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TernakRepository
 * @package App\Repositories
 * @version August 31, 2017, 6:56 am UTC
 *
 * @method Ternak findWithoutFail($id, $columns = ['*'])
 * @method Ternak find($id, $columns = ['*'])
 * @method Ternak first($columns = ['*'])
*/
class TernakRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'kode',
        'dob',
        'tanggal_masuk',
        'peternaks_id',
        'jenis_ternaks_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Ternak::class;
    }
}
