<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    
}
