<?php

namespace App\Http\Controllers;

use Database\Factories\BukuFactory;
use Illuminate\Http\Request;
use App\Models\Buku;

class BukuController extends Controller
{
    public function index(){
        $data_buku = Buku::all();

        //Var banyak data
        $jumlah_data = count($data_buku);

        //Var jumlah harga
        $total_harga = Buku::sum('harga');

        return view('buku.index', compact('data_buku','jumlah_data','total_harga'));
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
        return redirect('/buku') -> with('pesan', 'Data Buku (store) Berhasil di Simpan');
    }

    public function destroy($id){
        $buku = Buku::find($id);
        $buku -> delete();
        return redirect('/buku') -> with('pesan', 'Data Buku (destroy) Berhasil di Simpan');
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
        return redirect('/buku') -> with('pesan', 'Data Buku (update) Berhasil di Simpan');
    }
}