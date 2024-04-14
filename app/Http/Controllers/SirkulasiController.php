<?php

namespace App\Http\Controllers;
use App\Models\Buku;
use App\Models\NominalDenda;
use App\Models\Pinjam;
use App\Models\Pinjaman;
use Illuminate\Http\Request;

class SirkulasiController extends Controller
{
    public function pinjam()
    {
        $denda = NominalDenda::first();
        $pinjam = Pinjam::where('status',0)->get();
        $pinjaman = Pinjaman::get();
        return view('page.sirkulasi.peminjaman',compact('pinjam','pinjaman','denda'));
    }

    public function kembali()
    {
        return view('page.sirkulasi.pengembalian');
    }

    public function create()
    {
        $buku = Buku::where('jumlah','>',0)->get();
        return view('page.sirkulasi.tambah_pinjam',compact('buku'));
    }

    public function store(Request $request)
    {
        // return $request;
        if ($request->data_tabel == null)
        {
            return back();
        }else 
        {
            //menambah pinjaman
            $pinjam = new Pinjam;
            $pinjam->nama = $request->nama;
            $pinjam->tgl_pinjam = $request->tanggal_pinjam;
            $tanggal_berikut = date('Y-m-d',strtotime('+'.$request->lama.' days',strtotime($request->tanggal_pinjam)));
            $pinjam->tgl_kembali = $tanggal_berikut;
            $pinjam->lama_pinjam = $request->lama;
            $pinjam->status = 0;
            $pinjam->save();
            $no_pinjam = $pinjam->id;

            $data_tabel = json_decode($request->input('data_tabel'), true);
            if (is_array($data_tabel)) {
                foreach ($data_tabel as $data) {
                    //selisihkan buku
                    $buku = Buku::find($data);
                    $selisih = $buku->jumlah - 1;
                    $buku->jumlah = $selisih;
                    $buku->save();
                    //menambah data pinjaman
                    $pinjaman = new Pinjaman;
                    $pinjaman->buku_id = $data;
                    $pinjaman->pinjam_id = $no_pinjam;
                    $pinjaman->save();
                }
            }
            return redirect()->route('sirkulasi.pinjam');
        }
    }

    public function info($id)
    {
        $pinjam = Pinjam::find($id);
        $pinjaman = Pinjaman::where('pinjam_id',$id)->get();
        return $pinjaman;
    }
}
