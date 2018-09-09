<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\WpRequest;
use App\Register;
use App\Wp;
use Illuminate\Support\Facades\Input; //import file by excel
use DB;
use Excel;
use Session;

class WpController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $wp_list   = Wp::paginate(50);
        $jumlah_wp = Wp::count();
        return view('wp.index', compact('wp_list', 'jumlah_wp'));
    }

    public function create()
    {
        return view('wp.create');
    }

    public function store(WpRequest $request)
    {
        $input = $request->all();

        // Insert data wp
        $wp = Wp::create($input);

        Session::flash('flash_message', 'Data wajib pajak berhasil disimpan.');

        return redirect('wp');
    }

    public function show(Wp $wp)
    {
        return view('wp.show', compact('wp'));
    }

    public function edit(Wp $wp)
    {
        return view('wp.edit', compact('wp'));
    }

    public function update(Wp $wp, WpRequest $request)
    {
        $input = $request->all();

        // Update wp di tabel wp
        $wp->update($input);

        Session::flash('flash_message', 'Data register berhasil diupdate.');

        return redirect('wp');
    }

    public function cari(Request $request)
    {
        $kata_kunci     = $request->input('kata_kunci');
        $query          = Wp::where('nama_wp', 'LIKE', '%' . $kata_kunci . '%');
        $wp_list        = $query->paginate(10);
        $pagination     = $wp_list->appends($request->except('page'));
        $jumlah_wp      = $wp_list->total();
        return view('wp.index', compact('wp_list', 'kata_kunci', 'pagination', 'jumlah_wp')); 
    }

    public function destroy(Wp $wp)
    {
        $wp->delete();
        Session::flash('flash_message', 'Data wajib pajak berhasil dihapus.');
        Session::flash('penting', true);
        return redirect('wp');
    }

    public function importExport()
    {
        return view('importExport');
    }

    public function downloadExcel($type)
    {
        $data = Wp::get()->toArray();
        return Excel::create('DaftarWajibPajak_2016', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
    }

    public function importExcel()
    {
        if(Input::hasFile('import_file')){
            $path = Input::file('import_file')->getRealPath();
            $data = Excel::load($path, function($reader) {
            })->get();
            if(!empty($data) && $data->count()){
                foreach ($data as $key => $value) {
                    $insert[] = ['npwp' => $value->npwp, 'nama_wp' => $value->nama_wp, 'alamat' => $value->alamat];
                }
                if(!empty($insert)){
                    DB::table('wp')->insert($insert);
                    Session::flash('flash_message', 'Data berhasil di Import.');
                }
            }
        }
        return back();
    }

    public function pdf()
    {
        $wp_list   = Wp::paginate(50);
        return view('wp.pdf', compact('wp_list'));
    }

}
