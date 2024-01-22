<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class PDFController extends Controller
{
    public function cetakPDF(){
        $view_rumah = DB::table('view_rumah')->select('*')->get();
        $data = [
            'view_rumah' => $view_rumah,
            'tanggal' => date('d F Y'),
            'judul' => 'Laporan Data Bantuan Rumah'
        ];

        $laporan = PDF::loadView('rumah.laporan', $data)->setPaper('f4', 'landscape');
        $nama_tgl = substr(date('d/m/y'),0,2).substr(date('d/m/y'),3,2).substr(date('d/m/y'),6,2);
        $nama_jam = substr(date('d/m/y'),0,2).substr(date('d/m/y'),3,2).substr(date('h:i:s'),6,2);

        return $laporan->stream('laporan_'.$nama_tgl.$nama_jam.'.pdf');
    }

    public function cetakPDFPenduduk(){
        $penduduks = DB::table('penduduks')->select('*')->get();
        $data = [
            'penduduks' => $penduduks,
            'tanggal' => date('d F Y'),
            'judul' => 'Laporan Data Penduduk'
        ];

        $laporan = PDF::loadView('penduduk.laporan', $data)->setPaper('f4', 'landscape');
        $nama_tgl = substr(date('d/m/y'),0,2).substr(date('d/m/y'),3,2).substr(date('d/m/y'),6,2);
        $nama_jam = substr(date('d/m/y'),0,2).substr(date('d/m/y'),3,2).substr(date('h:i:s'),6,2);

        return $laporan->stream('laporan_'.$nama_tgl.$nama_jam.'.pdf');
    }

    public function cetakPDFSembako(){
        $viewsembako = DB::table('viewsembako')->select('*')->get();
        $data = [
            'viewsembako' => $viewsembako,
            'tanggal' => date('d F Y'),
            'judul' => 'Laporan Data Sembako'
        ];

        $laporan = PDF::loadView('sembako.laporan', $data)->setPaper('f4', 'landscape');
        $nama_tgl = substr(date('d/m/y'),0,2).substr(date('d/m/y'),3,2).substr(date('d/m/y'),6,2);
        $nama_jam = substr(date('d/m/y'),0,2).substr(date('d/m/y'),3,2).substr(date('h:i:s'),6,2);

        return $laporan->stream('laporan_'.$nama_tgl.$nama_jam.'.pdf');
    }

    public function cetakPDFTunai(){
        $view_tunai = DB::table('view_tunai')->select('*')->get();
        $data = [
            'view_tunai' => $view_tunai,
            'tanggal' => date('d F Y'),
            'judul' => 'Laporan Data Sembako'
        ];

        $laporan = PDF::loadView('tunai.laporan', $data)->setPaper('f4', 'landscape');
        $nama_tgl = substr(date('d/m/y'),0,2).substr(date('d/m/y'),3,2).substr(date('d/m/y'),6,2);
        $nama_jam = substr(date('d/m/y'),0,2).substr(date('d/m/y'),3,2).substr(date('h:i:s'),6,2);

        return $laporan->stream('laporan_'.$nama_tgl.$nama_jam.'.pdf');
    }

}
