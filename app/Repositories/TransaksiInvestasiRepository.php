<?php

namespace App\Repositories;

use App\Models\TransaksiInvestasi;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TransaksiInvestasiRepository
 * @package App\Repositories
 * @version September 2, 2017, 2:07 am UTC
 *
 * @method TransaksiInvestasi findWithoutFail($id, $columns = ['*'])
 * @method TransaksiInvestasi find($id, $columns = ['*'])
 * @method TransaksiInvestasi first($columns = ['*'])
*/
class TransaksiInvestasiRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'kode_transaksi',
        'paket_investasis_id',
        'asuransi',
        'ternak_investasis_id',
        'asuransis_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return TransaksiInvestasi::class;
    }
}
