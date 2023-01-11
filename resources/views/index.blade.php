@extends('utama.layout')

@section('main')

    <div class="container">

        {{-- search --}}
        <form action="">
            <div class="col-md-8 d-flex" style="margin: 0px auto" >
           
                <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Cari Barang...." aria-label="Recipient's username" aria-describedby="button-addon2" name="keyword" value="{{ request("keyword") }}" autocomplete="off"  >
                        <button class="btn text-light fw-bold" style="background-color: #0081C9"  type="submit" id="button-addon2">Cari</button>
                </div>   
            
            </div>
        </form> 

        {{-- barang --}}

            <div class="col-md-10 text-left shadow" style="margin: 0 auto" >
                <table class="table " >
                    <thead>
                      <tr>
                        <th style="background-color:#0081C9;border-radius:5px 0 0 0;color:white " class="fs-4" >
                            <i class="bi bi-box"></i> Barang</th>
                        <th  style="background-color:#0081C9;border-radius:0 5px 0 0;color:white " class="fs-4" >
                            <i class="bi bi-coin"></i> Harga</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($barang as $barangnya)
                        <tr>
                            <td style="background-color: white" class="fs-5" >{{ $barangnya->nama }}</td>
                            <td style="background-color: white" class="fs-5" >{{ $barangnya->harga }} <i class="bi bi-tag"></i></td>
                          </tr>
                        @endforeach
                      <tr>
                        <td style="background-color: #0081c9;border-radius:0px 0px 0px 5px " class="fs-5" ></td>
                        <td style="background-color: #0081c9; border-radius:0px 0px 5px 0px " class="fs-5" ></td>
                      </tr>
                  </table>
            </div>

            <div class="d-flex justify-content-center ">
                {{ $barang->links() }}
            </div>
           


    </div>
    
@endsection