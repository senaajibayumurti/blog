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
        <form action="{{route('buku.update',$buku->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="d-flex flex-column justify-content-between">
                <div class="justify-content-start">
                    <h5 class="">Data Buku:</h5>
                </div>
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
                <div class="justify-content-start">
                    <h5 class="">Thumbnail:</h5>
                </div>
                <div class="input-group d-flex flex-row justify-content-between align-content-start mb-2">
                    <p>Gambar</p>
                    <div class="custom-file w-75">
                        <input type="file" name="thumbnail" id="thumbnail">
                    </div>
                    @if ($buku -> filepath)
                    <div class="relative h-10 w-10">
                        <img 
                        class="h-full w-full rounded-full object-cover object-center"
                        src="{{ asset($buku -> filepath) }}"
                        alt="">
                    </div>
                    @endif
                </div>
                <div class="justify-content-start">
                    <h5 class="">Galeri:</h5>
                </div>
                <div class="input-group d-flex flex-row justify-content-between align-content-start mb-2">
                    <p>Gambar buat Galeri</p>
                    <div class="custom-file w-75">
                        <input type="file" name="galeri" id="galeri">
                    </div>
                </div>
                <div class="input-group d-flex flex-row justify-content-between align-content-center mb-2">
                    <div class="gallery_items">
                        @foreach ($buku -> gallery() -> get() as $gallery)
                            <div class="gallery_item h-full w-full rounded-full object-cover object-center">
                                <img src="{{ asset($gallery->path) }}" alt="" width="400"/>
                            </div>
                        @endforeach
                    </div>
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