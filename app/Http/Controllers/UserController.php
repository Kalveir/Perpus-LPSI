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
        return view('login');
    }

    public function autenticate(Request $request) : RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        // $credential = $request->only('email','password');
        $user = User::where('email', $credentials['email'])->first();
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('buku.index');
        } else {
            return redirect()->back();
        }
    }

    public function Logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
