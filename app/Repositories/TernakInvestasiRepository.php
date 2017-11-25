<?php

namespace App\Repositories;

use App\Models\TernakInvestasi;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TernakInvestasiRepository
 * @package App\Repositories
 * @version November 24, 2017, 9:26 am UTC
 *
 * @method TernakInvestasi findWithoutFail($id, $columns = ['*'])
 * @method TernakInvestasi find($id, $columns = ['*'])
 * @method TernakInvestasi first($columns = ['*'])
*/
class TernakInvestasiRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'ternaks_id',
        'paket_investasis_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return TernakInvestasi::class;
    }
}
