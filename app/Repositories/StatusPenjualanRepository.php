<?php

namespace App\Repositories;

use App\Models\StatusPenjualan;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class StatusPenjualanRepository
 * @package App\Repositories
 * @version September 2, 2017, 2:04 am UTC
 *
 * @method StatusPenjualan findWithoutFail($id, $columns = ['*'])
 * @method StatusPenjualan find($id, $columns = ['*'])
 * @method StatusPenjualan first($columns = ['*'])
*/
class StatusPenjualanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama_status'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return StatusPenjualan::class;
    }
}
