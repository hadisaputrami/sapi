<?php

namespace App\Repositories;

use App\Models\Investor;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class InvestorRepository
 * @package App\Repositories
 * @version September 10, 2017, 9:34 am UTC
 *
 * @method Investor findWithoutFail($id, $columns = ['*'])
 * @method Investor find($id, $columns = ['*'])
 * @method Investor first($columns = ['*'])
*/
class InvestorRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'update_at',
        'nama_pemilik_rek',
        'nama_bank',
        'no_rek',
        'users_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Investor::class;
    }
}
