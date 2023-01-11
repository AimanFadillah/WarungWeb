<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function index () {
        return view('index',[
            "barang" => Barang::latest()->Cari( request(["keyword"]) )->paginate(20)
        ]);
    }

}
