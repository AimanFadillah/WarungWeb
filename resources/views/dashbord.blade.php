@extends('dashbord.layout')

@section('main')

<div class="container">

    {{-- search --}}
    <form action="">
        <div class="col-md-8 d-flex" style="margin: 0px auto" >
       
            <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari Barang...." aria-label="Recipient's username" aria-describedby="button-addon2" name="keyword" value="{{ request("keyword") }}" autocomplete="off"  >
                    <button class="btn text-light fw-bold" style="background-color: #DC0000 "  type="submit" id="button-addon2">Cari</button>
            </div>   
        
        </div>
    </form> 

    {{-- barang --}}
    <div class="col-md-10"  style="margin: 0 auto"  >
        <a class="btn btn-success text-left mb-2 fw-bold  shadow " href="/dashbord/barang/create"><i class="bi bi-plus-circle"></i> Tambah Barang</a>

        @if(session()->has("success"))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session("success") }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>

        <div class="col-md-10 text-left shadow" style="margin: 0 auto" >

            <table class="table " >

                <thead>
                  <tr>
                    <th style="background-color:#DC0000 ;border-radius:5px 0 0 0;color:white " class="fs-4" >
                        <i class="bi bi-box"></i> Barang</th>
                    <th  style="background-color:#DC0000 ;border-radius:0 5px 0 0;color:white " class="fs-4" >
                        <i class="bi bi-tools"></i> Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($barang as $barangnya)
                    <tr>
                        <td style="background-color: white" class="fs-5" >{{ $barangnya->nama }}</td>
                        <td style="background-color: white" class="fs-5" >
                            <a href="/dashbord/barang/{{ $barangnya->id }}/edit" class="badge bg-warning"><i class="bi bi-pencil-square"></i></a>
                            <form action="/dashbord/barang/{{ $barangnya->id }}" class="d-inline" method="POST" >
                                @method("delete")
                                @csrf

                                <button class="badge bg-danger border-0" type="submit" onclick="return confirm('Yakin ingin menghapus {{ $barangnya->nama }}?') "><i class="bi bi-trash3" ></i></button>
                            </form>
                        </td>
                      </tr>
                    @endforeach
                  <tr>
                    <td style="background-color: #DC0000 ;border-radius:0px 0px 0px 5px " class="fs-5" ></td>
                    <td style="background-color: #DC0000 ; border-radius:0px 0px 5px 0px " class="fs-5" ></td>
                  </tr>
              </table>
        </div>

        <div class="d-flex justify-content-center ">
            {{ $barang->links() }}
        </div>
</div>  
    
@endsection