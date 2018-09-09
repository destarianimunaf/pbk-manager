<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\PbkRequest;
use App\Pbk;
use App\Register;
use App\Wp;
use Redirect;
use Storage;
use Session;

class PbkController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pbk_list   = Pbk::all();
        $jumlah_pbk = Pbk::count();
        return view('pbk.index', compact('pbk_list', 'jumlah_pbk'));
    }

    public function create()
    {
        return view('pbk.create');
    }

    public function store(PbkRequest $request)
    {
        $input = $request->all();
        $id = $request->id_register;

        if ($request->hasFile('scanpbk')) {
            $input['scanpbk'] = $this->uploadFile($request);
        }
         // Insert data pbk
        $register = Register::findOrFail($id)->update(['keterangan' => 'pbk']);
        $pbk = Pbk::create($input);
        
        //menambahkan pbk dan hapus register
        //$id_register = $request->id_register;
        //$delete = Register::findOrFail($id_register)->delete();

        Session::flash('flash_message', 'Data pemindahbukuan berhasil disimpan.');

        return redirect('pbk');
    }

    public function show(Pbk $pbk)
    {
        return view('pbk.show', compact('pbk'));
    }

    public function edit(Pbk $pbk)
    {
        return view('pbk.edit', compact('pbk'));
    }

    public function update(PbkRequest $request, Pbk $pbk)
    {
        $input = $request->all();

        if ($request->hasFile('scanpbk')) {
            // Hapus foto lama
            $this->hapusFile($pbk);

            // Upload foto baru
           $input['scanpbk'] = $this->uploadFile($request);
        }

        // Update pbk di tabel pbk
        $pbk->update($input);

        Session::flash('flash_message', 'Data pemindahbukuan berhasil diupdate.');

        return redirect('pbk');
    }

    public function printBuktiPbk(Pbk $pbk)
    {
        $register_list = Register::all();
        $wp_list = Wp::all();
        return view('pbk.printBuktiPbk', compact('pbk', 'register_list', 'wp_list'));
    }

    public function scanPbk() //upload lebih dari satu
    {
        $files = Input::file('scanpbk');
        // Making counting of uploaded images
        $file_count = count($files);
        // start count how many uploaded
        $uploadcount = 0;
        foreach($files as $file) {
          $rules = array('file' => 'required'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
          $validator = Validator::make(array('file'=> $file), $rules);
          if($validator->passes()){
            $destinationPath = 'uploadsPbk';
            $filename = $file->getClientOriginalName();
            $upload_success = $file->move($destinationPath, $filename);
            $uploadcount ++;
          }
        }
        if($uploadcount == $file_count){
          Session::flash('flash_message', 'Scan Bukti Pemindahbukuan Berhasil'); 
          return Redirect::to('pbk');
        } 
        else {
          return Redirect::to('pbk')->withInput()->withErrors($validator);
        }
    }

    private function uploadFile(PbkRequest $request)
    {
        $doc = $request->file('scanpbk');
        $ext  = $doc->getClientOriginalExtension();

        if ($request->file('scanpbk')->isValid()) {
            $doc_name   = $doc->getClientOriginalName();
            $upload_path = 'uploadsPbk';
            $request->file('scanpbk')->move($upload_path, $doc_name);

            // Filename untuk database --> 20160220214738.jpg
            return $doc_name;
        }
        return false;
    }

    private function hapusFile(Pbk $pbk)
    {
        $exist = Storage::disk('uploadsPbk')->exists($pbk->scanpbk);

        if (isset($pbk->scanpbk) && $exist) {
            $delete = Storage::disk('uploadsPbk')->delete($pbk->scanpbk);
            if ($delete) {
                return true;
            }
            return false;
        }
    }

    public function homepage_pbk(Pbk $pbk)
    {   
        //menampilakan data pbk yang memiliki keterangan == ditolak
        $pbk_list       = Pbk::where('status', 'denied')
                        ->get();
                        // echo "<pre>";
                        // print_r($register_list);
                        // exit();
        return view ('pbk.homepage_pbk', compact('pbk_list'));
    }

    public function destroy(Pbk $pbk)
    {
        $pbk->delete();
        Session::flash('flash_message', 'Data pemindahbukuan berhasil dihapus.');
        Session::flash('penting', true);
        return redirect('pbk');
    }
}
