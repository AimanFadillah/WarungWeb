<?php

namespace App\Http\Controllers;

use illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function index(){
        return view('login');
    }

    public function verifikasi (Request $request ) {

        $validatedData = $request->validate([
            "email" => "required|email:dns",
            "password" => "required"
        ]);

        if(Auth::attempt( $validatedData ) ){
            $request->session()->regenerate();
            return redirect()->intended("/beranda")->with("success","Selamat Datang Operator");
        }

        return back()->with("gagal","Data yang anda masukkan mengalami kegagalan");

    }

    public function logout (Request $request ){
        Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect("/beranda");
    }

}