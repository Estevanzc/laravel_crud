<?php

use App\Http\Controllers\CalcController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index', ["name" => "estevan"]);
});
Route::get("/test", function() {
    return view("index", [
        "name" => "estevan",
    ]);
});
Route::get("/test/{valor}", function($valor) {
    return view("index", [
        "name" => $valor,
    ]);
});
Route::get("/soma/{n1}/{n2}", [CalcController::class, "plus"]);
