<?php

namespace App\Repositories;

use App\User;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class UserRepository
 * @package App\Repositories
 * @version September 5, 2017, 2:37 am UTC
 *
 * @method User findWithoutFail($id, $columns = ['*'])
 * @method User find($id, $columns = ['*'])
 * @method User first($columns = ['*'])
*/
class UserRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'nik',
        'email',
        'kontak',
        'id_pelanggan',
        'no_rekening',
        'pekerjaan',
        'alamat',
        'password',
        'remember_token',
        'verified',
        'verification_token'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return User::class;
    }
}
