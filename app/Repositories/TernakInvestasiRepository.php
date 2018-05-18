<?php

namespace App\Repositories;

use App\Models\TernakInvestasi;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TernakInvestasiRepository
 * @package App\Repositories
 * @version May 15, 2018, 8:14 pm UTC
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
        'transaksi_investasis_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return TernakInvestasi::class;
    }
}
