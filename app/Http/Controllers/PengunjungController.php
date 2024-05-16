<?php

namespace App\Http\Controllers;

use App\Models\Pengunjung;
use Illuminate\Http\Request;

class PengunjungController extends Controller
{
    public function listPengunjung()
    {
        $pengunjung = Pengunjung::get();
        return view('page.pengunjung.pengunjung',compact('pengunjung'));
    }
    
    public function addPengunjung()
    {
        return view('page.pengunjung.tambah_pengunjung');
    }

    public function storePengunjung(Request $request)
    {
        $tanggal = date('Y-m-d');
        $pengunjung = new Pengunjung;
        $pengunjung->nama = $request-> nama;
        $pengunjung->instansi = $request->instansi;
        $pengunjung->alamat = $request->alamat;
        $pengunjung->jenis_kelamin = $request->jenis_kelamin;
        $pengunjung->tujuan = $request->tujuan;
        $pengunjung->tanggal = $tanggal;
        $pengunjung->save();
        return redirect()->route('pengunjung.create');
    }

    public function download(Request $request)
    {
        $tgl = date('d-m-Y');
        $awal = $request->dari_tanggal;
        $akhir = $request->sampai_tanggal;
        $pengunjung = Pengunjung::whereBetween('tanggal', [$awal, $akhir])->select('nama','instansi','alamat','jenis_kelamin','tujuan','tanggal')->get();
        $nama_file = 'data_pengunjung_' . $tgl . '.csv'; 
        $handle = fopen($nama_file, 'w+');
        fputcsv($handle, array_keys($pengunjung->first()->toArray())); 
        $pengunjung->each(function($item) use ($handle) {
            fputcsv($handle, $item->toArray());
        });
        fclose($handle); 

        return response()->streamDownload(function() use ($nama_file) {
            $handle = fopen($nama_file, 'rb');
            fpassthru($handle); 
            fclose($handle); 
        }, $nama_file);
    }

}
