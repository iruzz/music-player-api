<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Admin\SongController as AdminSongController;
use App\Http\Controllers\Admin\RequestController as AdminRequestController;
use App\Http\Controllers\User\SongController as UserSongController;
use App\Http\Controllers\User\RequestController as UserRequestController;

// === ROUTES UNTUK USER ===
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/songs', [UserSongController::class, 'index']);
    Route::post('/requests', [UserRequestController::class, 'store']);
    
});

// === ROUTES UNTUK ADMIN ===
Route::middleware(['auth:sanctum'])->prefix('admin')->group(function () {
    Route::get('/songs', [AdminSongController::class, 'index']);
    Route::post('/songs', [AdminSongController::class, 'store']);
    Route::get('/requests', [AdminRequestController::class, 'index']);
    Route::post('/requests/{id}/accept', [AdminRequestController::class, 'accept']);
    Route::delete('/requests/{id}', [AdminRequestController::class, 'destroy']);
});

// === AUTH ===
Route::post('/register', RegisterController::class);
Route::post('/login', LoginController::class);
Route::post('/logout', LogoutController::class)->middleware('auth:sanctum');

// === INFO USER YANG SUDAH LOGIN ===
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
