<?php

namespace App\Repositories;

use App\Models\TransaksiPenjualanHasStatusPenjualan;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TransaksiPenjualanHasStatusPenjualanRepository
 * @package App\Repositories
 * @version May 31, 2018, 1:46 am UTC
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
        'transaksi_penjualans_id',
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
