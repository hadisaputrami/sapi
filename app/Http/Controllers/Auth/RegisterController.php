<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Models\Investor;
use App\Role;
use DB;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        try{

            DB::beginTransaction();
            $user=User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
            ]);

            $role=Role::where('name','investor')->firstOrFail();
            $user->attach($role);
         
            $data['users_id']=$user->id;
            Investor::create([
                'nama_pemilik_rek' => $data['nama_pemilik_rek'],
                'nama_bank' => $data['nama_bank'],
                'no_rek' => $data['no_rek']
            ]);
/*
            '' => $data['nama_pemilik_rek'],
            'nama_bank' => $data['nama_bank'],
            'no_rek' => $data['no_rek']
*/
            DB::commit();

            
        }catch(Exception $e){
            DB::rollback();
        }
           //Session::flash('flash_me

    }
}
