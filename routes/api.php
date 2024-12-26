<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ContactController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', [RegisterController::class,'register']);
Route::post('/login', [RegisterController::class,'login']);
Route::post('/logout', [RegisterController::class,'logout'])->middleware('auth:sanctum');

Route::get('/news', [NewsController::class, 'index']);
Route::middleware('auth:sanctum')->post('/news',[NewsController::class, 'store']);
Route::middleware('auth:sanctum')->patch('/news/{news}',[NewsController::class, 'update']);
Route::middleware('auth:sanctum')->delete('/news/{news}',[NewsController::class, 'destroy']);

Route::middleware('auth:sanctum')->get('/contact', [ContactController::class, 'index']);
Route::post('/contact', [ContactController::class, 'store']);
Route::middleware('auth:sanctum')->delete('/contact/{contact}', [ContactController::class, 'destroy']);
