@extends('master')
<html lang="en">
<body>
    @section('content')
    <h1 class="text-center">TAMBAH BUKU</h1>
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
        <form method="POST" action="{{ route('buku.store') }}">
            @csrf
            <div class="d-flex flex-column justify-content-between">
                <div class="d-flex flex-row justify-content-between align-content-start mb-2">
                    <p>Judul</p>
                    <input type="text" name="judul" class="form-control w-75" placeholder="String">
                </div>
                <div class="d-flex flex-row justify-content-between mb-2">
                    <p>Penulis</p> 
                    <input type="text" name="penulis" class="form-control w-75" placeholder="String maksimal 30 karakter">
                </div>
                <div class="d-flex flex-row justify-content-between mb-2">
                    <p>Harga</p> 
                    <input type="number" name="harga" class="form-control w-75" placeholder="Angka">
                </div>
                <div class="d-flex flex-row justify-content-between mb-2">
                    <p>Tgl. Terbit</p> 
                    <input type="date" name="tgl_terbit" class="date form-control w-75" placeholder="yyyy/mm/dd">
                </div>
                <div class="d-flex flex-row justify-content-end mt-2">
                    <button type="submit" class="btn btn-success mr-2">Simpan</button>
                    <a class="btn btn-danger" href="/buku">Batal</a>
                </div>
            </div>
        </form>
    </div>    
    @endsection
</body>
</html>