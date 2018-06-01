<?php

namespace App\Repositories;

use App\Models\Progres;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ProgresRepository
 * @package App\Repositories
 * @version May 30, 2018, 10:23 pm UTC
 *
 * @method Progres findWithoutFail($id, $columns = ['*'])
 * @method Progres find($id, $columns = ['*'])
 * @method Progres first($columns = ['*'])
*/
class ProgresRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'foto',
        'deskripsi',
        'berat',
        'ternak_investasis_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Progres::class;
    }
}
