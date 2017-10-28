<?php

namespace App\Repositories;

use App\Models\JenisTernak;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class JenisTernakRepository
 * @package App\Repositories
 * @version October 28, 2017, 4:53 am UTC
 *
 * @method JenisTernak findWithoutFail($id, $columns = ['*'])
 * @method JenisTernak find($id, $columns = ['*'])
 * @method JenisTernak first($columns = ['*'])
*/
class JenisTernakRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama_jenis_ternaks'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return JenisTernak::class;
    }
}
