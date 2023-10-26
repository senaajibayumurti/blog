@extends('master')
<html lang="en">
<body>
    @section('content')
        @if (Session::has('pesan'))
        <div class="alert alert-success">{{Session::get('pesan')}}</div>
    @endif
    <div class="d-flex flex-row justify-content-between align-content-center">
        <h1>DATA BUKU</h1>
        <p><a name="tambah_buku" id="btn_tambah_buku" class="btn btn-primary" 
            href="{{ route('buku.create') }}" role="button">Tambah Buku</a>
        </p>
    </div>
    <div class="container-fluid">
        <table class="table table-striped">
            <thead>
                <tr>
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
                            <div class="d-flex flex-row justify-start align-items-start">
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
        <div class="float-end">{{ $jumlah_buku ->links() }}</div>
    </div>
    <div class="d-flex flex-row justify-content-between">
        <h3>Banyak Buku: {{ $jumlah_data }}</h3>
        <h3>Jumlah Total Harga: Rp {{ number_format($total_harga, 2, ',', '.') }}</h3> 
    </div>
    <br>
    @endsection
</body>
</html>