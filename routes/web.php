<?php

use App\Http\Controllers\MencobaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MencobaController::class,'welcome']);

Route::get('/home', [MencobaController::class,'home']);

Route::get('/boom', [MencobaController::class,'boom']);

Route::get('/cloud9', [MencobaController::class,'cloud9']);

Route::get('/prx', [MencobaController::class,'prx']);

Route::get('/indexEsport', [MencobaController::class, 'index']);
