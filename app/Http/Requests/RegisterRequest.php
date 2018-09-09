<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RegisterRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        if($this->method() == 'PATCH') {
            $nomor_pem = 'required|string|size:8|unique:register,nomor_pem,'. $this->get('id');
        } else {
            $nomor_pem = 'required|string|size:8|unique:register,nomor_pem';
        }
        return [
             'id_wp'         => 'required',
             'nomor_pem'     => $nomor_pem,
             'nama_pengaju'  => 'required|string|max:30',
             'cp'            => 'required|string|max:15',
             'tanggal_masuk' => 'required|date',
             'nilai_pbk'     => 'required|integer',
             'keterangan'    => 'required',
             'scanregister'  => 'sometimes|max:9000',
        ];
    }
}
