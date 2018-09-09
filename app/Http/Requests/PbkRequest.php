<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PbkRequest extends Request
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
        if($this->method() == 'PATCH') {
            $id_register = 'required|unique:pbk,id_register,'. $this->get('id');
            $nomor_pbk = 'required|string|size:5|unique:pbk,nomor_pbk,'. $this->get('id');
        } else {
            $id_register = 'required|unique:pbk,id_register';
            $nomor_pbk = 'required|string|size:5|unique:pbk,nomor_pbk';
        }
        return [
            'id_register'   => $id_register,
            'nomor_pbk'     => $nomor_pbk,
            'tanggal_cetak' => 'required|date',
            'lokasi_map'    => 'sometimes|string',
            'pos'           => 'required|in:ambil,kirim',
            'status'        => 'required|in:done,denied',
            'reason'        => 'sometimes|string',
            'scanpbk'       => 'sometimes',
        ];
    }
}
