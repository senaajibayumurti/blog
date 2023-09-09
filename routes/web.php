<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MencobaController;


Route::get('/', [MencobaController::class,'welcome']);

Route::get('/home', [MencobaController::class,'home']);

Route::get('/boom', [MencobaController::class,'boom']);

Route::get('/cloud9', [MencobaController::class,'cloud9']);

Route::get('/prx', [MencobaController::class,'prx']);
