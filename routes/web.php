<?php

use App\Http\Controllers\Autentikasi\LoginController;
use App\Http\Controllers\Ormawa\GantiPasswordController;
use App\Http\Controllers\Ormawa\IzinKegiatanController;
use App\Http\Controllers\Ormawa\LaporanKegiatanController;
use App\Http\Controllers\Ormawa\ProfilSayaController;
use App\Http\Controllers\SuperAdmin\AppController;
use App\Http\Controllers\SuperAdmin\GantiPasswordController as SuperAdminGantiPasswordController;
use App\Http\Controllers\SuperAdmin\IzinKegiatanController as SuperAdminIzinKegiatanController;
use App\Http\Controllers\SuperAdmin\LaporanKegiatanController as SuperAdminLaporanKegiatanController;
use App\Http\Controllers\SuperAdmin\ProfilSayaController as SuperAdminProfilSayaController;
use App\Http\Controllers\SuperAdmin\User\PenggunaController;
use App\Http\Controllers\Wadir\GantiPasswordController as WadirGantiPasswordController;
use App\Http\Controllers\Wadir\IzinKegiatanController as WadirIzinKegiatanController;
use App\Http\Controllers\Wadir\LaporanKegiatanController as WadirLaporanKegiatanController;
use App\Http\Controllers\Wadir\ProfilSayaController as WadirProfilSayaController;
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
                Route::post("/", [PenggunaController::class, "filter"]);
                Route::get("/create", [PenggunaController::class, "create"]);
                Route::post("/store", [PenggunaController::class, "store"]);
                Route::get("/show/{id}", [PenggunaController::class, "show"]);
                Route::put("/update/{id}", [PenggunaController::class, "update"]);
                Route::delete("/destroy/{id}", [PenggunaController::class, "destroy"]);
                Route::put("/non_aktifkan/{id}", [PenggunaController::class, "non_aktifkan"]);
                Route::put("/aktifkan/{id}", [PenggunaController::class, "aktifkan"]);
            });

            Route::prefix("izin_kegiatan")->group(function() {
                Route::get("/", [SuperAdminIzinKegiatanController::class, "index"]);
                Route::get("/show/{id}", [SuperAdminIzinKegiatanController::class, "show"]);
                Route::put("/update/{id}", [SuperAdminIzinKegiatanController::class, "update"]);
                Route::get("/laporan/{id}", [SuperAdminIzinKegiatanController::class, "file_laporan"]);
                Route::get("/balasan/{id}", [SuperAdminIzinKegiatanController::class, "file_balasan"]);
            });

            Route::prefix("laporan_kegiatan")->group(function() {
                Route::get("/", [SuperAdminLaporanKegiatanController::class, "index"]);
                Route::get("/show/{id}", [SuperAdminLaporanKegiatanController::class, "show"]);
                Route::get("/laporan/{id}", [SuperAdminLaporanKegiatanController::class, "laporan"]);
                Route::get("/dokumentasi/{id}", [SuperAdminLaporanKegiatanController::class, "dokumentasi"]);
            });

            Route::prefix("profil_saya")->group(function() {
                Route::get("/", [SuperAdminProfilSayaController::class, "index"]);
                Route::put("/update/{id}", [SuperAdminProfilSayaController::class, "update"]);
            });

            Route::prefix("ganti_password")->group(function() {
                Route::get("/", [SuperAdminGantiPasswordController::class, "index"]);
                Route::put("/update/{id}", [SuperAdminGantiPasswordController::class, "update"]);
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
                Route::get("/laporan/{id}", [WadirIzinKegiatanController::class, "file_laporan"]);
            });

            Route::prefix("laporan_kegiatan")->group(function() {
                Route::get("/", [WadirLaporanKegiatanController::class, "index"]);
                Route::get("/show/{id}", [WadirLaporanKegiatanController::class, "show"]);
            });

            Route::prefix("profil_saya")->group(function() {
                Route::get("/", [WadirProfilSayaController::class, "index"]);
                Route::put("/update/{id}", [WadirProfilSayaController::class, "update"]);
            });

            Route::prefix("ganti_password")->group(function() {
                Route::get("/", [WadirGantiPasswordController::class, "index"]);
                Route::put("/update/{id}", [WadirGantiPasswordController::class, "update"]);
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
                Route::get("/laporan/{id}", [IzinKegiatanController::class, "file_laporan"]);
                Route::get("/balasan/{id}", [IzinKegiatanController::class, "file_balasan"]);
            });

            Route::prefix("laporan_kegiatan")->group(function() {
                Route::get("/", [LaporanKegiatanController::class, "index"]);
                Route::get("{id}/unggah_laporan", [LaporanKegiatanController::class, "create"]);
                Route::post("/{id}/store", [LaporanKegiatanController::class, "store"]);
            });

            Route::prefix("profil_saya")->group(function() {
                Route::get("/", [ProfilSayaController::class, "index"]);
                Route::put("/update/{id}", [ProfilSayaController::class, "update"]);
            });

            Route::prefix("ganti_password")->group(function() {
                Route::get("/", [GantiPasswordController::class, "index"]);
                Route::put("/update/{id}", [GantiPasswordController::class, "update"]);
            });
            
        });
    });
    
    Route::get("/logout", [LoginController::class, "logout"]);
});

