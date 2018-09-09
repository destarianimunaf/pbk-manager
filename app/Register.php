<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    protected $table = 'register';
    protected $dates = ['tanggal_masuk'];
    protected $fillable = [
        'nomor_pem',
        'nama_pengaju',
        'cp',
        'tanggal_masuk',
        'nilai_pbk',
        'keterangan',
        'jenis_pajak',
        'setor',
        'masa',
        'id_wp',
        'scanregister',
    ];

    public function wp(){
    	return $this->belongsTo('App\Wp', 'id_wp');
    }
    
    public function getNamaPengajuAttribute($nama_pengaju){
    	return ucwords($nama_pengaju);
    }

    public function pbk()
    {
        return $this->hasOne('App\Pbk', 'id_register');
    }
}
