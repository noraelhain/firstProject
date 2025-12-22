<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Api;
use App\Http\Controllers\Api\HotelController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->prefix('hotels')->group(function () {
    Route::post('add', [HotelController::class, 'store']);
    Route::delete('/delete/{id}', [HotelController::class, 'destroy']);
    Route::post('update/{id}', [HotelController::class, 'update']);
});


//register
Route::post('/register', [AuthController::class, 'register']);



Route::get('/hotels',[HotelController::class,'index']);
Route::get('hotels/{id}',[HotelController::class,'show']);
