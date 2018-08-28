<?php

namespace App\Http\Requests\API;

use App\Models\KonfirmasiInvestor;
use InfyOm\Generator\Request\APIRequest;

class CreateKonfirmasiInvestorAPIRequest extends APIRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
         return [
        //return KonfirmasiInvestor::$rules;
         'status_konfirmasis_id'=> 'required',
        //'investors_id'=> 'required',
        'bank_pengirim'=> 'required',
        'bank_tujuan'=> 'required',
       'nominal'=> 'required',
        'nama_pengirim'=> 'required'
         ];
    }
}
