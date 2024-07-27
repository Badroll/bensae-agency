<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

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

Route::get('playground', [ApiController::class, 'playground']);

Route::prefix('auth')->group(function () {
    Route::post('login', [ApiController::class, 'authLogin']);
    Route::post('register', [ApiController::class, 'authRegister']);
    Route::post('logout', [ApiController::class, 'authLogout']);
});

    // to be middleware protected
    Route::prefix('permohonan')->group(function () {
        Route::get('/', [ApiController::class, 'permohonanGet']);
        Route::post('save', [ApiController::class, 'permohonanSave']);
        Route::get('detail', [ApiController::class, 'permohonanDetail']);
        Route::post('update', [ApiController::class, 'permohonanUpdate']);
        Route::post('delete', [ApiController::class, 'permohonanDelete']);
    });

    Route::prefix('master')->group(function () {
        Route::get('/', [ApiController::class, 'masterGet']);
        Route::post('save', [ApiController::class, 'masterSave']);
        Route::get('detail', [ApiController::class, 'masterDetail']);
        Route::post('update', [ApiController::class, 'masterUpdate']);
        Route::post('delete', [ApiController::class, 'masterDelete']);
    });

    Route::prefix('laporan')->group(function () { 
    });
