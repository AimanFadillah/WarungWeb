@extends('dashbord.layout')

@section('main')
    
<div class="container">
        
        
    @if( session()->has('gagal') )
    <div class="row justify-content-center d-flex ">
    <div class="col-md-5 ">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session("gagal") }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    </div>
    @endif

    <div class="row justify-content-center ">
    <div class="col-md-5 shadow rounded py-3" style="background-color:#DC0000">

        <h1 class="text-center fw-bold" style="color: #F5EA5A" ><span class="text-light" >Tambah</span> Barang</h1>
        
        <form action="/dashbord/barang" method="post">
            @csrf
         

            <div class="mb-3 mt-5 ">
                <input type="text" name="nama" required class="form-control  @error('nama') is-invalid @enderror "  placeholder="Nama Barang" autocomplete="off">
            </div>
            <div>
                <input type="number" name="harga" required class="form-control @error('harga') is-invalid @enderror "  placeholder="Harga">
            </div>
            <div class="mt-5 mb-3 d-flex justify-content-center">
                <button type="submit" class="btn btn-success fw-bold" >Tambah</button>
            </div>

        </form>

    </div>
    </div>
</div>

@endsection