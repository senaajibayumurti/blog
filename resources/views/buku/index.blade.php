<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pertemuan 8</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.min.js"></script>
</head>
<body>
    @if (Session::has('pesan'))
        <div class="alert alert-success">{{Session::get('pesan')}}</div>
    @endif
    <h1>DATA BUKU</h1>
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
                    <td>{{ \Carbon\Carbon::parse($buku->tgl_terbit)->format('d/m/y') }}</td>
                    <td>
                        <form action="{{ route('buku.destroy', $buku->id) }}" method="POST">
                            @csrf
                            <button onclick="return confirm('Yakin mo dihapus, banh?')" class="btn btn-primary" role="button">Hapus</button>
                        </form>
                            <a href="{{ route('buku.edit', $buku->id) }}" class="btn btn-primary" role="button">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <h3>Banyak Data: {{ $jumlah_data }}</h3>
    <h3>Jumlah Total Harga: Rp {{ number_format($total_harga, 2, ',', '.') }}</h3>

    <!-- Tambahan untuk laprak5pertemuan5 -->
    <br>
    <p><a name="tambah_buku" id="btn_tambah_buku" class="btn btn-primary" 
        href="{{ route('buku.create') }}" role="button">Tambah Buku</a>
    </p>
</body>
</html>