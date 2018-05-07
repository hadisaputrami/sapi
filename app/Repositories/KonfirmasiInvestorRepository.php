<?php

namespace App\Repositories;

use App\Models\KonfirmasiInvestor;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class KonfirmasiInvestorRepository
 * @package App\Repositories
 * @version May 7, 2018, 9:01 pm UTC
 *
 * @method KonfirmasiInvestor findWithoutFail($id, $columns = ['*'])
 * @method KonfirmasiInvestor find($id, $columns = ['*'])
 * @method KonfirmasiInvestor first($columns = ['*'])
*/
class KonfirmasiInvestorRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'status_konfirmasi',
        'investors_id',
        'bank_pengirim',
        'bank_tujuan',
        'nominal',
        'nama_pengirim'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return KonfirmasiInvestor::class;
    }
}
