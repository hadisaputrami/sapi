<?php

namespace App\Repositories;

use App\Models\PaketInvestasi;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PaketInvestasiRepository
 * @package App\Repositories
 * @version October 28, 2017, 4:37 am UTC
 *
 * @method PaketInvestasi findWithoutFail($id, $columns = ['*'])
 * @method PaketInvestasi find($id, $columns = ['*'])
 * @method PaketInvestasi first($columns = ['*'])
*/
class PaketInvestasiRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama',
        'harga',
        'massa',
        'lama_kontrak',
        'deskripsi'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return PaketInvestasi::class;
    }
}
