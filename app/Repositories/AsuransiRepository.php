<?php

namespace App\Repositories;

use App\Models\Asuransi;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class AsuransiRepository
 * @package App\Repositories
 * @version May 14, 2018, 4:29 pm UTC
 *
 * @method Asuransi findWithoutFail($id, $columns = ['*'])
 * @method Asuransi find($id, $columns = ['*'])
 * @method Asuransi first($columns = ['*'])
*/
class AsuransiRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'premi',
        'nomor_polis',
        'nama_penjamin'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Asuransi::class;
    }
}
