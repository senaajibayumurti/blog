@extends('layouts.app')
<html lang="en">
<body>
    @section('content')
    <h1 class="text-center">EDIT BUKU</h1>
    @if (count($errors) > 0)
        <div class="container w-50">
            <ul class="alert alert-danger px-5">
                @foreach ($errors -> all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container w-50">
        <form action="{{route('buku.update',$buku->id)}}" method="POST">
            @csrf
            <div class="d-flex flex-column justify-content-between">
                <div class="d-flex flex-row justify-content-between align-content-start mb-2">
                    <p>Judul</p>
                    <input type="text" name="judul" id="judul" class="form-control w-75"
                    value="{{$buku->judul}}">
                </div>
                <div class="d-flex flex-row justify-content-between mb-2">
                    <p>Penulis</p>
                    <input type="text" name="penulis" id="penulis" class="form-control w-75"
                    value="{{$buku->penulis}}">    
                </div>
                <div class="d-flex flex-row justify-content-between mb-2">
                    <p>Harga</p>
                    <input type="number" name="harga" id="harga" class="form-control w-75"
                    value="{{$buku->harga}}">    
                </div>
                <div class="d-flex flex-row justify-content-between mb-2">
                    <p>Tgl. Terbit</p>
                    <input type="date" name="tgl_terbit" id="tgl_terbit" class="date form-control w-75" placeholder="yyyy/mm/dd"
                    value="{{$buku->tgl_terbit}}">    
                </div>
                <div class="d-flex flex-row justify-content-around mt-2 w-25 align-self-end">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a class="btn btn-danger" href="/home">Batal</a>
                </div>
            </div>
        </form>
    </div>
    @endsection
</body>
</html>