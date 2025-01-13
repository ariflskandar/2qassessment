<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::middleware("auth")->group(function(){
    Route::get('/', function () {
        return redirect()->route('companies.index');
    });
});

Route::get("/login", [AuthController::class, 'login']);
Route::post("/login", [AuthController::class, "loginPost"])->name("login");

Route::resource('companies', CompanyController::class);