<?php

namespace App\Repositories;

use App\Models\Progres;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ProgresRepository
 * @package App\Repositories
 * @version September 2, 2017, 2:03 am UTC
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
