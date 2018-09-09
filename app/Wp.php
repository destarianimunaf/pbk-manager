<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wp extends Model
{
    protected $table = 'wp';

    protected $fillable = [
        'npwp',
        'nama_wp',
        'alamat',
    ];

    public function register(){
    	return $this->hasMany('App\Register', 'id_wp');
    }

    //nama_wp dan alamat menjadi huruf kapital di awal
    public function getNamaWpAttribute($nama_wp)
    {
    	return ucwords($nama_wp);
    }

    public function getAlamatAttribute($alamat)
    {
    	return ucwords($alamat);
    }

}
