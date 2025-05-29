<?php

use App\Http\Controllers\CalcController;
use App\Http\Controllers\KeepinhoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function() {
    return view('index');
});

Route::get("/soma/{n1}/{n2}", [CalcController::class, "plus"]);
Route::get("/sub/{n1}/{n2}", [CalcController::class, "minus"]);
Route::get("/power/{n1}", [CalcController::class, "power"]);

Route::middleware(["auth"])->group(function () {
    Route::get('/', [KeepinhoController::class, "index"])->name("keep.index");
    Route::prefix("/keep")->group(function () {
        Route::post('/insert', [KeepinhoController::class, "insert_data"])->name("keep.insert");
        Route::get('/edit/{note}', [KeepinhoController::class, "edit_data"])->name("keep.edit");
        Route::put('/update', [KeepinhoController::class, "update_data"])->name("keep.update");
        Route::get('/delete/{note}', [KeepinhoController::class, "delete_data"])->name("keep.delete");
        Route::get('/lixeira', [KeepinhoController::class, "trash"])->name("keep.trash");
        Route::get('/restore/{note}', [KeepinhoController::class, "trash_restore"])->name("keep.restore");
    });
});
Route::prefix("/auth")->group(function () {
    Route::get('/auth_logout', [UserController::class, "logout"])->name("logout");
    Route::get('/auth_login', [UserController::class, "index"])->name("login");
    Route::get('/auth_logon', [UserController::class, "logon"])->name("logon");
    Route::post('/auth_login/athenticate', [UserController::class, "athenticate"])->name("auth.athenticate");
    Route::post('/auth_logon', [UserController::class, "auth_logon"])->name("auth.create");
});
