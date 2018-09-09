<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\RegisterRequest;
use App\Register;
use App\Wp;
use App\Pbk;
use Storage;
use Session;
use DB;
use Carbon\Carbon;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $now = Carbon::now();
        $register_list   = Register::where('keterangan', '!=', 'pbk')->paginate(50);
        $jumlah_register = Register::count();
        $pbk             = Pbk::all();
        return view('register.index', compact('register_list', 'pbk', 'jumlah_register', 'now'));
    }

    public function create()
    {
        return view('register.create');
    }

    public function store(RegisterRequest $request)
    {
        $input = $request->all();

        if ($request->hasFile('scanregister')) {
            $input['scanregister'] = $this->uploadFoto($request);
        }

         // Insert data register
        $register = Register::create($input);

        Session::flash('flash_message', 'Data register berhasil disimpan.');

        return redirect('register');
    }

    public function show(Register $register)
    {
        return view('register.show', compact('register'));
    }

    public function edit(Register $register)
    {
        return view('register.edit', compact('register'));
    }

    public function update(RegisterRequest $request, Register $register)
    {
        $input = $request->all();

        if ($request->hasFile('scanregister')) {
            // Hapus foto lama
            $this->hapusFoto($register);

            // Upload foto baru
           $input['scanregister'] = $this->uploadFoto($request);
        }

        // Update register di tabel register
        $register->update($input);

        Session::flash('flash_message', 'Data register berhasil diupdate.');

        return redirect('register');
    }

    private function uploadFoto(RegisterRequest $request)
    {
        $foto = $request->file('scanregister');
        $ext  = $foto->getClientOriginalExtension();

        if ($request->file('scanregister')->isValid()) {
            $foto_name   = date('YmdHis'). ".$ext";
            $upload_path = 'scanregister';
            $request->file('scanregister')->move($upload_path, $foto_name);

            // Filename untuk database --> 20160220214738.jpg
            return $foto_name;
        }
        return false;
    }

    private function hapusFoto(Register $register)
    {
        $exist = Storage::disk('scanregister')->exists($register->scanregister);

        if (isset($register->scanregister) && $exist) {
            $delete = Storage::disk('scanregister')->delete($register->scanregister);
            if ($delete) {
                return true;
            }
            return false;
        }
    }

    public function homepage_register(Register $register)
    {   
        //menampilakan data register yang memiliki keterangan == pending
        $register_list = Register::where('keterangan', 'pending')
                        ->get();
                        // echo "<pre>";
                        // print_r($register_list);
                        // exit();
        return view ('register.homepage_register', compact('register_list', 'jumlah_pending'));
    }
    
    public function destroy(Register $register)
    {
        $register->delete();
        Session::flash('flash_message', 'Data register berhasil dihapus.');
        Session::flash('penting', true);
        print_r($register->delete());
        return redirect('register');
    }
}
