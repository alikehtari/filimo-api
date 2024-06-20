<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\MovieController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('faq', FaqController::class);
Route::resource('movie', MovieController::class);


// Route::post('/faq',[FaqController::class,'store']);

Route::post('/auth/login',[AuthController::class,'login']);