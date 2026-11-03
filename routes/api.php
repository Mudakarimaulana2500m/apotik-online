<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ObatController;
use App\Http\Controllers\Api\PelangganController;
use App\Http\Controllers\Api\StafApotekController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('obat', ObatController::class);
Route::apiResource('pelanggan', PelangganController::class);
Route::apiResource('staf', StafApotekController::class);