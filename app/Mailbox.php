<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mailbox extends Model
{
    protected $table = 'mailbox';
    
    protected $fillable = [
    	'pengirim',
    	'penerima',
    	'judul',
    	'isi_pesan',
    	'attach',
    	'tanggal_kirim',
    ];
}
