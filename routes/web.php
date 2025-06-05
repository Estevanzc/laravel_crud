<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalcController;
use App\Http\Controllers\KeepinhoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
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

Route::resource("products", ProductController::class);

Route::get("/soma/{n1}/{n2}", [CalcController::class, "plus"]);
Route::get("/sub/{n1}/{n2}", [CalcController::class, "minus"]);
Route::get("/power/{n1}", [CalcController::class, "power"]);

require __DIR__.'/auth.php';
