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
    <h1>EDIT BUKU</h1>
    <div class="container">
        <h4>Edit Buku</h4>
        <form action="{{route('buku.update',$buku->id)}}" method="POST">
            @csrf
            <div>Judul
                <input type="text" name="judul" id="judul"
                value="{{$buku->judul}}">
            </div>
            <div>Penulis
                <input type="text" name="penulis" id="penulis"
                value="{{$buku->penulis}}">    
            </div>
            <div>Harga
                <input type="text" name="harga" id="harga"
                value="{{$buku->harga}}">    
            </div>
            <div>Tanggal Terbit
                <input type="text" name="tgl_terbit" id="tgl_terbit" class="date form-control" placeholder="yyyy/mm/dd"
                value="{{$buku->tgl_terbit}}">    
            </div>
            <div><button type="submit">Simpan</button></div>
            <a href="/buku"> Batal</a>
        </form>
    </div>
</body>
</html>