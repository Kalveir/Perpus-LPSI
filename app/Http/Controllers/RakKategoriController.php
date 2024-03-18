<?php

namespace App\Http\Controllers;

use App\Models\Rak;
use App\Models\Kategori;
use Illuminate\Http\Request;

class RakKategoriController extends Controller
{
   //kelola rak
    public function listRak()
    {
       $rak = Rak::get();
       return view('page.rak.rak',compact('rak')); 
    }

    public function addRak(Request $request)
    {
      $rak = new Rak;
      $rak->nama = $request->nama;
      $rak->save();
      return redirect()->route('rak.index');
    }

    public function updateRak(Request $request,$id)
    {
      $rak = Rak::find($id);
      $rak->nama = $request->nama;
      $rak->save();
      return redirect()->route('rak.index');
    }

    public function deleteRak($id)
    {
      $rak = Rak::find($id);
      $rak->delete();
      return redirect()->route('rak.index');
    }

    //kelola kategori
    public function listKategori()
    {
       $kategori = Kategori::get(); 
       return view('page.kategori.kategori',compact('kategori'));
    }

    public function addKategori(Request $request)
    {
      $kategori = new Kategori;
      $kategori->nama = $request->nama;
      $kategori->save();
      return redirect()->route('kategori.index');
    }

    public function updateKategori(Request $request,$id)
    {
      $kategori = Kategori::find($id);
      $kategori->nama = $request->nama;
      $kategori->save();
      return redirect()->route('kategori.index');
    }

    public function deleteKategori($id)
    {
      $kategori = Kategori::find($id);
      $kategori->delete();
      return redirect()->route('kategori.index');
    }
}
