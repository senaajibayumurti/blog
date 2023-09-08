<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MencobaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/about', function () {
    return view('about', [
        "name" => "johnthor",
        "email" => "jontor@mail.com"
    ]);
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/boom', [MencobaController::class,'boomesport']);

Route::get('/prx', [MencobaController::class,'prxesport']);

Route::get('/fnatic', [MencobaController::class,'fnaticesport']);

Route::get('/fpx', [MencobaController::class,'fpxesport']);

Route::get('/', [MencobaController::class,'beranda']);
