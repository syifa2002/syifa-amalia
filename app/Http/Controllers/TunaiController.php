<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Tunai;
use App\Models\Penduduk;

class TunaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $view_tunai = DB::table('view_tunai')->select('*')->get();
        return view('tunai.tunai', compact('view_tunai'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $penduduks = Penduduk::orderBy('nik_kk', 'asc')->get();
        return view('tunai.create', compact('penduduks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $simpan = new Tunai();
        $simpan->nik_kk = $request->input('nik');
        $simpan->jumlah_dana = $request->input('dana');
        $simpan->tgl_bantuan = $request->input('tanggal');
        $simpan->keterangan = $request->input('keterangan');
        $simpan->save();
        return redirect()->route('tunai.index')->with('pesan', 'Data berhasil ditambahkan');  
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data =  DB::table('view_tunai')->where('id', $id)->first(); 
        return view('tunai.show', compact('data'));       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $view_tunai = DB::table('view_tunai')->where('id', $id)->get();
        $penduduks = Penduduk::orderBy('nik_kk', 'asc')->get();
        return view('tunai.edit', compact('view_tunai', 'penduduks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $ubah = Tunai::findOrFail($id);
        $ubah->nik_kk = $request->input('nik');
        $ubah->jumlah_dana = $request->input('dana');
        $ubah->tgl_bantuan = $request->input('tanggal');
        $ubah->keterangan = $request->input('keterangan');
        $ubah->save();
        return redirect()->route('tunai.index')->with('pesan', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $hapus = Tunai::findOrFail($id);
        $hapus->delete();
        return redirect()->route('tunai.index')->with('pesan', 'Data berhasil dihapus');
    }
}
