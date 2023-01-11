@extends('utama.layout')

@section('main')
    
    {{-- login --}}
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
        <div class="col-md-5 shadow rounded py-3" style="background-color:#0081C9">

            <h1 class="text-center fw-bold" style="color: #F5EA5A" >Operator</h1>
            
            <form action="/login" method="post">
                @csrf
             

                <div class="mb-3 mt-5 ">
                    <input type="email" name="email" class="form-control  @error('email') is-invalid @enderror "  placeholder="Gmail">
                </div>
                <div>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror "  placeholder="Password">
                </div>
                <div class="mt-5 mb-3 d-flex justify-content-center">
                    <button type="submit" class="btn btn-success fw-bold" >Masuk</button>
                </div>

            </form>

        </div>
        </div>
    </div>

@endsection