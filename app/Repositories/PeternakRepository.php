<?php

namespace App\Repositories;

use App\Models\Peternak;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PeternakRepository
 * @package App\Repositories
 * @version September 2, 2017, 2:02 am UTC
 *
 * @method Peternak findWithoutFail($id, $columns = ['*'])
 * @method Peternak find($id, $columns = ['*'])
 * @method Peternak first($columns = ['*'])
*/
class PeternakRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'users_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Peternak::class;
    }
}
