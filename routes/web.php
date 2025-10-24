<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PublicacaoController;

Route::get('/', [PublicacaoController::class, 'index'])->name('home');
Route::post('/login', [PublicacaoController::class, 'login'])->name('login');


Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/', [PublicacaoController::class, 'index'])->name('home');
Route::post('/login', [PublicacaoController::class, 'login'])->name('login');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});



require __DIR__.'/auth.php';
