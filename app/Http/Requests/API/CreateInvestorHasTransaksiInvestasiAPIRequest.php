<?php

namespace App\Http\Requests\API;

use App\Models\InvestorHasTransaksiInvestasi;
use InfyOm\Generator\Request\APIRequest;

class CreateInvestorHasTransaksiInvestasiAPIRequest extends APIRequest
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
            'asuransi' => 'required',
            'paket_investasis_id' => 'required',
            'nominal_investasi'=>'required',
            'jenis_pembayarans_id'=>'required',
            'jumlah_sapi'=>'required',
        ];
    }
}
