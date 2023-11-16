<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Database\Factories\BukuFactory;
use Illuminate\Http\Request;
use App\Models\Buku;
use Intervention\Image\Facades\Image;

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

    //Tambahan Thumbnail
    public function update(Request $request, $id){
        $buku = Buku::find($id);

        if ($request->file('thumbnail')) {
            $request->validate([
                'thumbnail' => 'image|mimes:jpeg,jpg,png|max:2048'
            ]);

            $fileName = time().'_'.$request->thumbnail->getClientOriginalName();
            $filePath = $request->file('thumbnail')->storeAs('uploads', $fileName, 'public');
            
            Image::make(storage_path().'/app/public/uploads/'.$fileName)->fit(140,220)->save();
        }

        if($request -> file('gallery')){
            foreach($request -> file('gallery') as $key => $file){
                $filename = time().'_'.$file -> getClientOriginalName();
                $filepath = $file -> storeAs('uploads', $filename, 'public') ;

                $gallery = Galeri::create([
                    'nama_galeri'   => $filename,
                    'path'          => '/storage/'.$filepath,
                    'foto'          => $filename,
                    'buku_id'       => $id
                ]);
            }
        }

        if ($request->file('thumbnail')) {
            $buku->update([
                'judul' => $request->judul,
                'penulis' => $request->penulis,
                'harga' => $request->harga,
                'tgl_terbit' => $request->tgl_terbit,
                'filename' => $fileName,
                'filepath' => '/storage/' . $filePath
            ]);
        } else {
            if ($buku->filepath) {
                $buku->update([
                    'judul' => $request->judul,
                    'penulis' => $request->penulis,
                    'harga' => $request->harga,
                    'tgl_terbit' => $request->tgl_terbit,
                    'filename' => $buku->filename,
                    'filepath' => $buku->filepath
                ]);
            }
        }
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
        $this -> middleware('auth');
    }
}