<?php

namespace App\Repositories;

use App\Models\InvestorHasTransaksiInvestasi;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class InvestorHasTransaksiInvestasiRepository
 * @package App\Repositories
 * @version September 2, 2017, 1:58 am UTC
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
        'jenis_pembayarans_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return InvestorHasTransaksiInvestasi::class;
    }
}
