<?php

use App\Http\Controllers\BukuController;
use Illuminate\Support\Facades\Route;

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
Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about', [
        "name" => "johnthor",
        "email" => "jontor@mail.com"
    ]);
});

Auth::routes();

Route::get('/home', [BukuController::class, 'index'])->middleware(['auth', 'verified'])->name('home');

// Route::middleware('auth')->group(function () {

//     Route::get('/buku/create', [BukuController::class,'create']) -> name('buku.create');
//     Route::post('/buku/store', [BukuController::class,'store']) -> name('buku.store');

//     Route::post('/buku/delete/{id}', [BukuController::class,'destroy']) -> name('buku.destroy');

//     Route::get('/buku/edit/{id}', [BukuController::class, 'edit'])->name('buku.edit');

//     Route::post('/buku/update/{id}', [BukuController::class, 'update'])->name('buku.update'); 

//     // SEARCH
//     Route::get('buku/search', [BukuController::class, 'search'])->name('buku.search');
// });
// SEARCH
Route::get('buku/search', [BukuController::class, 'search'])->name('buku.search');

Route::middleware(['admin',''])->group(function () {
    Route::get('/buku/create', [BukuController::class,'create']) -> name('buku.create');
    Route::post('/buku/store', [BukuController::class,'store']) -> name('buku.store');

    Route::post('/buku/delete/{id}', [BukuController::class,'destroy']) -> name('buku.destroy');

    Route::get('/buku/edit/{id}', [BukuController::class, 'edit'])->name('buku.edit');

    Route::post('/buku/update/{id}', [BukuController::class, 'update'])->name('buku.update'); 
});