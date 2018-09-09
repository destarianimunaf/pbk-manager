<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Wp;
use App\Register;
use App\Pbk;
use App\Mailbox;

class PagesController extends Controller
{
    public function homepage()
    {
    	$jumlah_wp = Wp::count();
    	$jumlah_register = Register::count();
        $jumlah_pbk = Pbk::count();
        $jumlah_mailbox = Mailbox::count();
        
        $jumlah_pending = Register::where('keterangan', 'pending')
                        ->count();
        $jumlah_denied = Pbk::where('status', 'denied')
                        ->count();
        return view('pages.homepage', compact('jumlah_wp', 'jumlah_register', 'jumlah_pbk', 'jumlah_mailbox', 'jumlah_pending', 'jumlah_denied'));
    }

    public function about()
    {
        $halaman = 'about';
        return view('pages.about', compact('halaman'));
    }

}