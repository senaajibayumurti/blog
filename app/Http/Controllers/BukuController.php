<?php

namespace App\Http\Controllers;

use Database\Factories\BukuFactory;
use Illuminate\Http\Request;
use App\Models\Buku;

class BukuController extends Controller
{
    public function index(){
        $batas = 5;
        $jumlah_data = Buku::count();
        $data_buku = Buku::orderBy('id', 'desc')->paginate($batas);
        $no = $batas * ($data_buku -> currentPage()-1);

        //Var jumlah harga
        $total_harga = Buku::sum('harga');

        return view('buku.index', compact('data_buku','jumlah_data','no', 'total_harga'));
    }

    //Tambahan untuk laprak5pertemuan5
    public function create(){
        return view('buku.create');
    }

    public function store(Request $request){
        $this -> validate($request, [
            'judul'         => 'required|string',
            'penulis'       => 'required|string|max:30',
            'harga'         => 'required|numeric',
            'tgl_terbit'    => 'required|date'
        ]);
        Buku::create([
            'judul'         => $request -> judul,
            'penulis'       => $request -> penulis,
            'harga'         => $request -> harga,
            'tgl_terbit'    => $request -> tgl_terbit
        ]);
        return redirect('/home') -> with('pesan', 'Data Buku (store) Berhasil di Simpan');
    }

    public function destroy($id){
        $buku = Buku::find($id);
        $buku -> delete();
        return redirect('/home') -> with('pesan', 'Data Buku (destroy) Berhasil di Simpan');
    }

    //Tugas Praktikum laprak5pertemuan5
    public function edit($id){
        $buku = Buku::find($id);
        return view('buku.edit', compact('buku'));
    }
    public function update(Request $request, $id){
        $buku = Buku::find($id);
        $this -> validate($request, [
            'judul'         => 'required|string',
            'penulis'       => 'required|string|max:30',
            'harga'         => 'required|numeric',
            'tgl_terbit'    => 'required|date'
        ]);
        $buku -> update([
            'judul' => $request -> judul,
            'penulis' => $request -> penulis,
            'harga' => $request -> harga,
            'tgl_terbit' => $request -> tgl_terbit
        ]);
        return redirect('/home') -> with('pesan', 'Data Buku (update) Berhasil di Simpan');
    }

    // SEARCH
    public function search(Request $request) {
        $batas = 5;
        $cari = $request -> kata;
        $jumlah_data = Buku::count();
        $data_buku = Buku::where('judul', 'like', "%".$cari."%")->orwhere('penulis', 'like', "%".$cari."%")->paginate($batas);
        $no = $batas * ($data_buku->currentPage() - 1);

        //Var jumlah harga
        $total_harga = $data_buku->sum('harga');

        return view('buku.index', compact('data_buku','jumlah_data','no', 'total_harga'));
    }

    public function _construct(){
        $this -> middleware('admin');
    }
}