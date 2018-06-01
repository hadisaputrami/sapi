<?php

namespace App\Repositories;

use App\Models\TransInvesHasStatusInves;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TransInvesHasStatusInvesRepository
 * @package App\Repositories
 * @version May 30, 2018, 11:37 pm UTC
 *
 * @method TransInvesHasStatusInves findWithoutFail($id, $columns = ['*'])
 * @method TransInvesHasStatusInves find($id, $columns = ['*'])
 * @method TransInvesHasStatusInves first($columns = ['*'])
*/
class TransInvesHasStatusInvesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'transaksi_investasis_id',
        'status_transaksi_investasis_id',
        'users_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return TransInvesHasStatusInves::class;
    }
}
