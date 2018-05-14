<?php

namespace App\Repositories;

use App\Models\JenisTernak;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class JenisTernakRepository
 * @package App\Repositories
 * @version May 14, 2018, 7:01 pm UTC
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
        'jenis_ternak'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return JenisTernak::class;
    }
}
