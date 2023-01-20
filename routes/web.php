<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FrozenFoodController;
use Illuminate\Support\Facades\Route;

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

Route::group(
    ["middleware" => ["auth"]],
    function() {
        Route::get("/", [AppController::class, "dashboardPage"]);
        Route::get("/logout", [AuthController::class, "logout"]);
        Route::get("/table", [FrozenFoodController::class, "table"]);
        Route::get("/foods", [FrozenFoodController::class, "getFroozenFood"])->name("getfood");
    }
);

Route::group(
    ["middleware" => ["guest"]],
    function() {
        Route::get("/login", [AuthController::class, "loginPage"])->name("login");
        Route::post('/login', [AuthController::class, "login"]);
    }
);
