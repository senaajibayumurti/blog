<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EsportModel;

class MencobaController extends Controller
{
    //Method untuk memanggil view
    public function welcome(){
        return view('welcome');
    }
    
    public function home(){
        return view('home');
    }
    
    public function boom(){
        return view('boom');
    }
    
    public function cloud9(){
        return view('cloud9');
    }
    
    public function prx(){
        return view('prx');
    }

    //Seeder
    public function index(){
        //$data_teamSeeder = EsportModel::all();
        $data_teamSeeder = EsportModel::all() -> sortByDesc('id_team');

        return view('teamSeeder.indexEsport', compact('data_teamSeeder'));
    }
    
}
