<?php

namespace App\Repositories;

use App\Models\TernakNonInvestasi;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TernakNonInvestasiRepository
 * @package App\Repositories
 * @version May 16, 2018, 4:08 pm UTC
 *
 * @method TernakNonInvestasi findWithoutFail($id, $columns = ['*'])
 * @method TernakNonInvestasi find($id, $columns = ['*'])
 * @method TernakNonInvestasi first($columns = ['*'])
*/
class TernakNonInvestasiRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'massa_awal',
        'ternaks_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return TernakNonInvestasi::class;
    }
}
