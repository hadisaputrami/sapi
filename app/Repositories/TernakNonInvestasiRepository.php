<?php

namespace App\Repositories;

use App\Models\TernakNonInvestasi;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TernakNonInvestasiRepository
 * @package App\Repositories
 * @version September 10, 2017, 9:16 am UTC
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
