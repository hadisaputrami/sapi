<?php

namespace App\Repositories;

use App\Models\StatusKonfirmasi;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class StatusKonfirmasiRepository
 * @package App\Repositories
 * @version May 15, 2018, 7:13 pm UTC
 *
 * @method StatusKonfirmasi findWithoutFail($id, $columns = ['*'])
 * @method StatusKonfirmasi find($id, $columns = ['*'])
 * @method StatusKonfirmasi first($columns = ['*'])
*/
class StatusKonfirmasiRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return StatusKonfirmasi::class;
    }
}
