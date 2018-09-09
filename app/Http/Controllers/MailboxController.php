<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Mailbox;
use Validator;
use Session;
use Storage;

class MailboxController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        date_default_timezone_set("Asia/Jakarta");
        $mailbox_list = Mailbox::all();
        return view('mailbox.index', compact('mailbox_list'));
    }

    public function create()
    {
        return view('mailbox.create');
    }

    public function store(Request $request)
    {
        $input = $request->all();

        if ($request->hasFile('attach')) {
            $input['attach'] = $this->uploadFile($request);
        }

        $validator = Validator::make($input, [
            'pengirim'      => 'required|string',
            'penerima'      => 'required|string',
            'judul'         => 'sometimes|string|max:255',
            'tanggal_kirim' => 'date',
            'isi_pesan'     => 'required|string|max:2000',
            'attach'        => 'sometimes',
        ]);

        if ($validator->fails()){
            return redirect('mailbox/create')->withInput()
            ->withErrors($validator);
        }
        // Insert data pbk
        $mailbox = Mailbox::create($input);

        Session::flash('flash_message', 'Pesan Berhasil Dikrim.');

        return redirect('mailbox');
    }

    public function show(Mailbox $mailbox)
    {
        return view('mailbox.show', compact('mailbox'));
    }

    public function edit(Mailbox $mailbox)
    {
        return view('mailbox.edit', compact(mailbox));
    }

    public function update(Request $request, Mailbox $mailbox)
    {
        $input = $request->all();

        // Update mailbox di tabel mailbox
        $mailbox->update($input);

        Session::flash('flash_message', 'Pesan berhasil diupdate.');

        return redirect('mailbox');
    }

    private function uploadFile(Request $request)
    {
        $doc = $request->file('attach');
        $ext  = $doc->getClientOriginalExtension();

        if ($request->file('attach')->isValid()) {
            $doc_name   = $doc->getClientOriginalName();
            $upload_path = 'attach';
            $request->file('attach')->move($upload_path, $doc_name);

            // Filename untuk database --> 20160220214738.jpg
            return $doc_name;
        }
        return false;
    }

    private function hapusFile(Mailbox $mailbox)
    {
        $exist = Storage::disk('attach')->exists($mailbox->attach);

        if (isset($mailbox->attach) && $exist) {
            $delete = Storage::disk('attach')->delete($mailbox->attach);
            if ($delete) {
                return true;
            }
            return false;
        }
    }

    public function destroy(Mailbox $mailbox)
    {
        $mailbox->delete();
        Session::flash('flash_message', 'Pesan Berhasil Dihapus.');
        Session::flash('penting', true);
        return redirect('mailbox');
    }
}
