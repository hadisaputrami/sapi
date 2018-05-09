<?php

namespace App\Repositories;

use App\Models\TransaksiInvestasi;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TransaksiInvestasiRepository
 * @package App\Repositories
 * @version May 9, 2018, 6:55 pm UTC
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
