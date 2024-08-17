<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () { return Redirect::to("permohonan"); });

Route::match(["get","post"], "token", function () {
    return reply("SUCCESS", "Token", csrf_token());
});

Route::get('tes', [WebController::class, 'list']);

Route::middleware([])->group(function () {
    Route::prefix('auth')->group(function () {
        
        Route::get('/', function () {
            return Redirect::to("/auth/login");
        });
        Route::get("/login", [AuthController::class, 'login']);
        Route::post("/login-store", [AuthController::class, 'loginGateway']);
        
        Route::get("/register", [AuthController::class, 'register']);
        Route::post("/register-store", [AuthController::class, 'pelangganRegister']);

        Route::match(["get", "post"], "/logout", [AuthController::class, 'logout']);
    });
});

/*
- setiap request akan dimintai USER_TOKEN yg berasal dari session
- USER_TOKEN dicreate (session dan tabel) pertama kali saat login
- middleware akan mengecek USER_TOKEN
-- jika valid maka recreate USER_TOKEN, lalu proses request
-- jika tidak valid akan menghapus USER_TOKEN, lalu kick ke login
------------------------------------------------------------------
ekspektasi:
USER_TOKEN akan valid untuk satu request saja, karena nilainya akan selalu diubah setelah diakses.
Sehingga tidak bisa menggunakan USER_TOKEN (dari session) yg sama
*/
Route::middleware(["custom_auth_token"])->group(function () {
    Route::get('tes2', [WebController::class, 'list2']);

    Route::prefix('permohonan')/*->middleware(["custom_privilege_permohonan"])*/->group(function () {
        Route::get('/', [WebController::class, 'permohonan']);
        Route::get('add', [WebController::class, 'permohonanAdd']);
        Route::get('update', [WebController::class, 'permohonanUpdate']);
    });

});