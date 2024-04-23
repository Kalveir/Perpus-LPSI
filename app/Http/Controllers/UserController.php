<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function login()
    {
        return view('page.login');
    }

    public function autenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) 
        {
            $request->session()->regenerate();
            return redirect()->intended('home');
        }else{
            Alert::error('Login Gagal', 'Periksa Username & Password anda');
            return redirect()->back();
        }
    }

    public function Logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function Home()
    {
        if(Auth::user()->hasRole(['Petugas']))
        {
            return redirect()->route('buku.index');
        }
        else if(Auth::user()->hasRole(['Pengunjung']))
        {
            return redirect()->route('pengunjung.create');
        }    
    }
}
