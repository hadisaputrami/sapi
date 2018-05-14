<?php

namespace App\Repositories;

use App\Models\TransaksiPenjualanHasStatusPenjualan;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TransaksiPenjualanHasStatusPenjualanRepository
 * @package App\Repositories
 * @version May 11, 2018, 11:45 pm UTC
 *
 * @method TransaksiPenjualanHasStatusPenjualan findWithoutFail($id, $columns = ['*'])
 * @method TransaksiPenjualanHasStatusPenjualan find($id, $columns = ['*'])
 * @method TransaksiPenjualanHasStatusPenjualan first($columns = ['*'])
*/
class TransaksiPenjualanHasStatusPenjualanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'status_penjualans_id',
        'users_id',
        'jenis_pembayarans_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return TransaksiPenjualanHasStatusPenjualan::class;
    }
}
