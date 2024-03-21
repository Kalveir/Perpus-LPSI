<?php

namespace App\Http\Controllers;
use App\Models\Rak;
use App\Models\Kategori;
use App\Models\Buku;

use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        $buku = Buku::get();
        return view('page.buku.buku',compact('buku'));
    }

    public function create()
    {
        $kategori = Kategori::get();
        $rak = Rak::get();
        return view('page.buku.tambah_buku',compact('kategori','rak'));
    }

    public function info()
    {
        //
    }

    public function store(Request $request)
    {
        return $request;
    }
}
