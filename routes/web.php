<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplyController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\FeedbackController;


/*
|--------------------------------------------------------------------------
| Public Homepage
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');


/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback.index');
    Route::get('/feedback/create', [FeedbackController::class, 'create'])->name('feedback.create');
    Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');
    Route::get('/feedback/{feedback}', [FeedbackController::class, 'show'])->name('feedback.show');
    Route::post('/feedback/{feedback}/reply', [FeedbackController::class, 'reply'])->name('feedback.reply');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');


    // Apply
    Route::get('/apply', [ApplyController::class, 'index'])
        ->name('apply.index');

    Route::post('/send', [ApplyController::class, 'send'])
        ->name('apply.send');


    // History
    Route::patch('/history/{id}/status', [ApplyController::class, 'updateStatus'])
        ->name('history.update-status');

    Route::delete('/history/{id}', [ApplyController::class, 'destroyHistory'])
        ->name('history.destroy');

    Route::get('/history/resend/{id}', [ApplyController::class, 'resendHistory'])
        ->name('history.resend');


    // Files
    Route::get('/files', [FileController::class, 'index'])
        ->name('files.index');

    Route::post('/files', [FileController::class, 'store'])
        ->name('files.store');

    Route::get('/files/download/{filename}', [FileController::class, 'download'])
        ->name('files.download');

    Route::delete('/files/{filename}', [FileController::class, 'destroy'])
        ->name('files.destroy');

    /*
    |--------------------------------------------------------------------------
    | Google OAuth
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/auth/google',
        [GoogleAuthController::class, 'redirect']
    )->name('google.connect');

    Route::get(
        '/auth/google/callback',
        [GoogleAuthController::class, 'callback']
    )->name('google.callback');

    Route::delete(
        '/auth/google',
        [GoogleAuthController::class, 'disconnect']
    )->name('google.disconnect');
});

/*
|--------------------------------------------------------------------------
| Legal Pages
|--------------------------------------------------------------------------
*/

Route::view('/privacy-policy', 'legal.privacy-policy')
    ->name('privacy-policy');

Route::view('/terms', 'legal.terms')
    ->name('terms');



require __DIR__ . '/auth.php';
