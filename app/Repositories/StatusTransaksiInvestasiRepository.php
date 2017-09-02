<?php

namespace App\Repositories;

use App\Models\StatusTransaksiInvestasi;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class StatusTransaksiInvestasiRepository
 * @package App\Repositories
 * @version September 2, 2017, 2:06 am UTC
 *
 * @method StatusTransaksiInvestasi findWithoutFail($id, $columns = ['*'])
 * @method StatusTransaksiInvestasi find($id, $columns = ['*'])
 * @method StatusTransaksiInvestasi first($columns = ['*'])
*/
class StatusTransaksiInvestasiRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return StatusTransaksiInvestasi::class;
    }
}
