<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use Notifiable;
    use EntrustUserTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','kontak','nik','tanggal_lahir','jenis_kelamin','foto','alamat','kota','provinsi'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static $rules = [

    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules_create = [
        'name' => 'required|string|max:255',
        'kontak'=>'required|string|unique:users|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:6|confirmed',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules_update = [
        'name' => 'required|string|max:255',
        'kontak'=>'required|string|unique:users|max:255',
    ];
}
