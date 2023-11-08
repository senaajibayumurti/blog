@extends('layouts.app')
<html lang="en">
<body>
@section('content')
    @if (Session::has('pesan'))
        <div class="alert alert-success">{{Session::get('pesan')}}</div>
    @endif
    <div class="container">
        <h1>DATA BUKU</h1>
        <div class="d-flex flex-row justify-content-end align-items-center">
            @if (Auth::check() && Auth::user() -> level == 'admin')
            <p><a name="tambah_buku" id="btn_tambah_buku" class="btn btn-primary" 
                href="{{ route('buku.create') }}" role="button">Tambah Buku</a>
            </p>
            @endif
            {{-- SEARCH --}}
            <form action="{{ route('buku.search') }}" method="get" class="w-25">
                @csrf
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">&#128269;</div>
                    </div>
                    <input type="text" class="form-control" name="kata" id="inlineFormInputGroupUsername" placeholder="Cari Buku ..." style="width: 50%; display: inline; float: right;">
                </div>
            </form>
        </div>
        <div class="d-flex flex-column">
            <table class="table table-bordered">
                <thead>
                    <tr class="table-primary">
                        <th>id</th>
                        <th>Judul Buku</th>
                        <th>Penulis</th>
                        <th>Harga</th>
                        <th>Tgl. Terbit</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data_buku as $buku)
                        <tr>
                            <td>{{ $buku -> id}}</td>
                            <td>{{ $buku -> judul}}</td>
                            <td>{{ $buku -> penulis}}</td>
                            <td>{{ "Rp ".number_format($buku->harga, 2, ',', '.') }}</td>
                            {{-- <td>{{ \Carbon\Carbon::parse($buku->tgl_terbit)->format('d/m/y') }}</td> --}}
                            <td>{{ \Carbon\Carbon::parse($buku->tgl_terbit)->format('d-m-y') }}</td>
                            <td>
                                <div class="d-flex flex-row justify-content-around align-items-start">
                                    <form action="{{ route('buku.destroy', $buku->id) }}" method="POST">
                                        @csrf
                                        <button onclick="return confirm('Yakin mo dihapus, banh?')" class="btn btn-danger mr-2" role="button">Hapus</button>
                                    </form>
                                        <a href="{{ route('buku.edit', $buku->id) }}" class="btn btn-warning" role="button">Edit</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="float-end">{{ $data_buku ->links() }}</div>
        </div>
        <div class="d-flex flex-row justify-content-between">
            <h3>Banyak Buku: {{ $jumlah_data }}</h3>
            <h3>Total Harga: Rp {{ number_format($total_harga, 2, ',', '.') }}</h3> 
        </div>
    </div>
    <br>
@endsection
</body>
</html>