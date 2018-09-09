<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pbk extends Model
{
    protected $table	= 'pbk';

    protected $primary = 'id_register';
    protected $dates = ['tanggal_cetak'];

    protected $fillable = [
    	'id_register',
        'nomor_pem',
    	'nomor_pbk',
    	'tanggal_cetak',
    	'lokasi_map',
    	'pos',
        'status',
        'reason',
        'scanpbk',
    ];

    public function register()
    {
    	return $this->belongsTo('App\Register', 'id_register');
    }
}
