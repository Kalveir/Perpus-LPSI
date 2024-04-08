<?php

namespace App\Http\Controllers;
use App\Models\Buku;
use App\Models\Pinjam;
use App\Models\Pinjaman;

use Illuminate\Http\Request;

class SirkulasiController extends Controller
{
    public function pinjam()
    {
        return view('page.sirkulasi.peminjaman');
    }

    public function kembali()
    {
        return view('page.sirkulasi.pengembalian');
    }

    public function create()
    {
        $buku = Buku::get();
        return view('page.sirkulasi.tambah_pinjam',compact('buku'));
    }

    public function store(Request $request )
    {
        $pinjam = new Pinjam;
        $pinjam->nama = $request->
        $pinjam->tanggal_pinjam = $request->tanggal;
        $data_tabel = json_decode($request->input('data_tabel'), true);
        if (is_array($data_tabel)) {
            foreach ($data_tabel as $data) {
                $pinjaman = new Pinjaman;
            }
        }
    }
}
