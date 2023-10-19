<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Buku Create</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.min.js"></script>
</head>
<body>
    @if (count($errors) > 0)
        <ul class="alert-alert-danger">
            @foreach ($errors -> all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <h1>TAMBAH BUKU</h1>
    <form method="POST" action="{{ route('buku.store') }}">
        @csrf
        <div>Judul <input type="text" name="judul" class="form-control" placeholder="String"></div>
        <div>Penulis <input type="text" name="penulis" class="form-control" placeholder="String maksimal 30 karakter"></div>
        <div>Harga <input type="text" name="harga" class="form-control" placeholder="Angka"></div>
        <div>Tgl. Terbit <input type="text" name="tgl_terbit" class="date form-control" placeholder="yyyy/mm/dd"></div>
        <div>
            <button type="submit">Simpan</button>
            <a href="/buku">Batal</a>
        </div>
    </form>
</body>
</html>