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


    public function info($id)
    {
        $buku = Buku::find($id);
        return view('page.buku.info_buku',compact('buku'));
    }

    public function store(Request $request)
    {
        $buku = new Buku;
        $buku->judul = $request->judul;
        $buku->isbn = $request->isbn;
        $buku->penulis = $request->penulis;
        $buku->penerbit = $request->penerbit;
        $buku->kategori_id = $request->kategori;
        $buku->rak_id = $request->rak;
        $buku->tahun = $request->tahun;
        $buku->isi = $request->isi;
        $buku->jumlah = $request->jumlah;
        $buku->no_induk = $request->induk;
        $buku->rf_id = $request->rf_id;
        $buku->tanggal_masuk = $request->tanggal_masuk;
        $buku->no_barcode = $request->barcode;
        $buku->peroleh = $request->peroleh;
        if($request->sampul)
        {
          $buku->sampul = $request->file('sampul')->hashName();
          $request->file('sampul')->store('sampul');
        }
        $buku->save();
        return redirect()->route('buku.index');
    }

    public function edit($id)
    {
        $buku = Buku::find($id);
        $kategori = Kategori::get();
        $rak = Rak::get();
        return view('page.buku.edit_buku',compact('buku','kategori','rak'));
    }

    public function update(Request $request,$id)
    {
        $buku = Buku::find($id);
        $buku->judul = $request->judul;
        $buku->isbn = $request->isbn;
        $buku->penulis = $request->penulis;
        $buku->penerbit = $request->penerbit;
        $buku->kategori_id = $request->kategori;
        $buku->rak_id = $request->rak;
        $buku->tahun = $request->tahun;
        $buku->isi = $request->isi;
        $buku->jumlah = $request->jumlah;
        $buku->no_induk = $request->induk;
        $buku->rf_id = $request->rf_id;
        $buku->tanggal_masuk = $request->tanggal_masuk;
        $buku->no_barcode = $request->barcode;
        $buku->peroleh = $request->peroleh;
        if($request->sampul)
        {
          $filepath = public_path('storage/sampul/' . $buku->sampul);
          if (file_exists($filepath)){
            unlink($filepath);
          }
          $buku->sampul = $request->file('sampul')->hashName();
          $request->file('sampul')->store('sampul');
        }
        $buku->save();
        return redirect()->route('buku.index');
    }

    public function destroy($id)
    {
        $buku = Buku::find($id);
        $filepath = public_path('storage/sampul/' . $buku->sampul);
        if (file_exists($filepath)){
            unlink($filepath);
        }
        $buku->delete();
        return redirect()->route('buku.index');
    }
}
