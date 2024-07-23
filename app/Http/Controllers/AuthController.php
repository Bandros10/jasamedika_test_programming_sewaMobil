<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\client;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(){
        return view('auths.login');
    }

    public function register(){
        return view('auths.register');
    }

    public function loginpost(Request $req_login){
        if (Auth::attempt($req_login->only('email','password'))) {
            return redirect('/dashoard');
        }
        return redirect('/login');
    }

    public function registerpost(Request $req_register){
        $user = User::create([
            'name' => $req_register->name,
            'email' => $req_register->email,
            'email_verified_at' => now(),
            'password' => Hash::make($req_register->password),
            'remember_token' => Str::random(10),
        ]);
        client::create([
            'telepon' => $req_register->telepon,
            'no_SIM' => $req_register->no_SIM,
            'alamat' => $req_register->alamat,
            'user_id' => $user->id
        ]);
        return redirect('/login')->with('sukses','login telah berhasil,silahkan login untuk menggunakan aplikasi');
    }

    public function logout(){
        Auth::logout();
        return view('welcome');
    }
}
