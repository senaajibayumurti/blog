<?php

namespace App\Http\Controllers;

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
}
