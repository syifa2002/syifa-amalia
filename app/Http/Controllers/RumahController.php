<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Rumah;
use App\Models\Penduduk;

class RumahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $view_rumah = DB::table('view_rumah')->select('*')->get();
        return view('rumah.rumah', compact('view_rumah'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $penduduks = Penduduk::orderBy('nik_kk', 'asc')->get();
        return view('rumah.create', compact('penduduks'));   
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $simpan = new Rumah();
        $simpan->nik_kk = $request->input('nik');
        $simpan->jumlah_dana = $request->input('dana');
        $simpan->tgl_bantuan = $request->input('tanggal');
        $simpan->keterangan = $request->input('keterangan');
        $simpan->save();
        return redirect()->route('rumah.index')->with('pesan', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = DB::table('view_rumah')->where('id', $id)->first(); 
        return view('rumah.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $view_rumah = DB::table('view_rumah')->where('id', $id)->get(); 
        $penduduks = Penduduk::orderBy('nik_kk', 'asc')->get();
        return view('rumah.edit', compact('view_rumah', 'penduduks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $update = Rumah::findOrFail($id);
        $update->nik_kk = $request->input('nik');
        $update->jumlah_dana = $request->input('dana');
        $update->tgl_bantuan = $request->input('tanggal');
        $update->keterangan = $request->input('keterangan');
        $update->save();
        return redirect()->route('rumah.index')->with('pesan', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $hapus = Rumah::findOrFail($id);
        $hapus->delete();
        return redirect()->route('rumah.index')->with('pesan', 'Data berhasil dihapus');
    }
}
