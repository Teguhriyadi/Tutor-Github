<?php

use App\Http\Controllers\Autentikasi\LoginController;
use App\Http\Controllers\SuperAdmin\AppController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get("/templating", function() {
    return view("templating");
});

Route::get("/login", [LoginController::class, "login"]);
Route::post("/login", [LoginController::class, "post_login"]);

Route::prefix("super_admin")->group(function() {
    Route::get("/dashboard", [AppController::class, "dashboard"]);
});
