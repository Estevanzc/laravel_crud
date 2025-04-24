<?php

use App\Http\Controllers\CalcController;
use App\Http\Controllers\KeepinhoController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function() {
    return view('index');
});

Route::get("/soma/{n1}/{n2}", [CalcController::class, "plus"]);
Route::get("/sub/{n1}/{n2}", [CalcController::class, "minus"]);
Route::get("/power/{n1}", [CalcController::class, "power"]);

Route::prefix("/keep")->group(function () {
    Route::get('/', [KeepinhoController::class, "index"]);
});
