<?php

namespace App\Repositories;

use App\Models\KonfirmasiInvestor;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class KonfirmasiInvestorRepository
 * @package App\Repositories
 * @version May 4, 2018, 11:30 pm UTC
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
        'investors_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return KonfirmasiInvestor::class;
    }
}
