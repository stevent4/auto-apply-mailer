<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplyController;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', [ApplyController::class, 'index'])->name('apply.index');
Route::post('/send', [ApplyController::class, 'send'])->name('apply.send');
Route::patch('/history/{id}/status', [ApplyController::class, 'updateStatus'])->name('history.update-status');
// Tambahkan Route Hapus di sini:
Route::delete('/history/{id}', [ApplyController::class, 'destroyHistory'])->name('history.destroy');
// Tambahkan Route Kirim Ulang di sini:
Route::get('/history/resend/{id}', [ApplyController::class, 'resendHistory'])->name('history.resend');

require __DIR__ . '/auth.php';
