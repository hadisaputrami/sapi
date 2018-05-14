<?php

namespace App\Repositories;

use App\Models\InvestorHasTransaksiInvestasi;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class InvestorHasTransaksiInvestasiRepository
 * @package App\Repositories
 * @version May 11, 2018, 10:32 pm UTC
 *
 * @method InvestorHasTransaksiInvestasi findWithoutFail($id, $columns = ['*'])
 * @method InvestorHasTransaksiInvestasi find($id, $columns = ['*'])
 * @method InvestorHasTransaksiInvestasi first($columns = ['*'])
*/
class InvestorHasTransaksiInvestasiRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'transaksi_investasis_id',
        'nominal_investasi',
        'scan_bukti_pembayaran',
        'jenis_pembayarans_id',
        'jumlah_sapi'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return InvestorHasTransaksiInvestasi::class;
    }
}
