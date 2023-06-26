<?php

use App\Http\Controllers\Autentikasi\LoginController;
use App\Http\Controllers\Ormawa\IzinKegiatanController;
use App\Http\Controllers\SuperAdmin\AppController;
use App\Http\Controllers\SuperAdmin\IzinKegiatanController as SuperAdminIzinKegiatanController;
use App\Http\Controllers\SuperAdmin\User\PenggunaController;
use App\Http\Controllers\Wadir\IzinKegiatanController as WadirIzinKegiatanController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get("/templating", function() {
    return view("templating");
});

Route::group(["middleware" => ["guest"]], function() {
    Route::get("/", [LoginController::class, "login"]);
    Route::get("/login", [LoginController::class, "login"]);
    Route::post("/login", [LoginController::class, "post_login"]);
});

Route::group(["middleware" => ["is_admin"]], function() {
    Route::group(["middleware" => ["can:admin"]], function() {
        Route::prefix("super_admin")->group(function() {
            Route::get("/dashboard", [AppController::class, "dashboard"]);
            Route::prefix("data_pengguna")->group(function() {
                Route::get("/", [PenggunaController::class, "index"]);
                Route::get("/create", [PenggunaController::class, "create"]);
                Route::post("/store", [PenggunaController::class, "store"]);
                Route::get("/show/{id}", [PenggunaController::class, "show"]);
                Route::put("/update/{id}", [PenggunaController::class, "update"]);
                Route::delete("/destroy/{id}", [PenggunaController::class, "destroy"]);
            });

            Route::prefix("izin_kegiatan")->group(function() {
                Route::get("/", [SuperAdminIzinKegiatanController::class, "index"]);
                Route::get("/show/{id}", [SuperAdminIzinKegiatanController::class, "show"]);
                Route::put("/update/{id}", [SuperAdminIzinKegiatanController::class, "update"]);
            });
        });
    });

    Route::group(["middleware" => ["can:wadir"]], function() {
        Route::prefix("wadir")->group(function() {
            Route::get("/dashboard", [AppController::class, "dashboard_wadir"]);
            Route::prefix("izin_kegiatan")->group(function() {
                Route::get("/", [WadirIzinKegiatanController::class, 'index']);
                Route::get("/show/{id}", [WadirIzinKegiatanController::class, "show"]);
                Route::put("/update/{id}", [WadirIzinKegiatanController::class, "update"]);
            });
        });
    });
    
    Route::group(["middleware" => ["can:ormawa"]], function() {
        Route::prefix("ormawa")->group(function() {
            Route::get("/dashboard", [AppController::class, "dashboard_ormawa"]);
            Route::prefix("izin_kegiatan")->group(function() {
                Route::get("/", [IzinKegiatanController::class, "index"]);
                Route::get("/create", [IzinKegiatanController::class, "create"]);
                Route::post("/store", [IzinKegiatanController::class, "store"]);
                Route::get("/edit/{id}", [IzinKegiatanController::class, "edit"]);
                Route::get("/show/{id}", [IzinKegiatanController::class, "show"]);
                Route::put("/update/{id}", [IzinKegiatanController::class, "update"]);
                Route::delete("/destroy/{id}", [IzinKegiatanController::class, "destroy"]);
            });
        });
    });
    
    Route::get("/logout", [LoginController::class, "logout"]);
});

