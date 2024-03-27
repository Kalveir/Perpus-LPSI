<?php

namespace App\Http\Controllers;
use App\Models\Buku;

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
}
