<?php

namespace App\Repositories;

use App\Models\Biodata;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class BiodataRepository
 * @package App\Repositories
 * @version May 4, 2018, 11:28 pm UTC
 *
 * @method Biodata findWithoutFail($id, $columns = ['*'])
 * @method Biodata find($id, $columns = ['*'])
 * @method Biodata first($columns = ['*'])
*/
class BiodataRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'users_id',
        'tanggal_lahir',
        'jenis_kelamin',
        'pendidikan_terakhir',
        'agama_id',
        'foto',
        'kontak'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Biodata::class;
    }
}
