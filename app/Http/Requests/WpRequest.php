<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class WpRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'npwp'      => 'required|string|max:15',
            'nama_wp'   => 'required|string|max:30',
            'alamat'    => 'required|string',
        ];
    }
}
