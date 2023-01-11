<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;


class DashbordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashbord',[
            'barang' => Barang::latest()->Cari( request(["keyword"]) )->paginate(20)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tambahBarang');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "nama" => "required|max:30",
            "harga" => "required"
        ]);

        Barang::create($validatedData);

        return redirect("/dashbord/barang")->with("success","Barang berhasil dimasukkan");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang)
    {

        return view('editBarang',[
            'barang' => $barang
        ]);

        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, barang $barang)
    {
        $validatedData = $request->validate([
            "nama" => "required|max:30",
            "harga" => "required"
        ]);

        Barang::where("id",$barang->id)->update($validatedData);

        return redirect("/dashbord/barang")->with("success",$barang->nama . " berhasil di edit");


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(barang $barang)
    {
        Barang::destroy($barang->id);

        return redirect('/dashbord/barang')->with('success', $barang->nama . ' berhasil dibuang');
    }
}
