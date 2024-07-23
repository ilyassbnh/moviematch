<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Public routes
Route::get('/movies', [MovieController::class, 'index']);

// Routes protected with sanctum
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/movies', [MovieController::class, 'store']);
    Route::get('/movies/{id}', [MovieController::class, 'show']);
    Route::put('/movies/{id}', [MovieController::class, 'update']);
    Route::delete('/movies/{id}', [MovieController::class, 'destroy']);
});

// Admin routes
Route::middleware(['auth:sanctum', 'admin'])->group(function () {
    // Admin-specific routes
    Route::post('/admin/movies', [MovieController::class, 'adminStore']);
    Route::delete('/admin/movies/{id}', [MovieController::class, 'adminDestroy']);
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum'); 
