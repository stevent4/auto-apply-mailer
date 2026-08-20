<?php

use App\Http\Controllers\ApplyController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Profile & Profile Completion
|--------------------------------------------------------------------------
|
| Route profile tetap dapat diakses oleh user yang belum
| menyelesaikan biodata.
|
*/

Route::middleware('auth')->group(function () {

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');


    // Profile Completion
    Route::get('/profile/complete', [
        ProfileController::class,
        'complete',
    ])->name('profile.complete');

    Route::patch('/profile/complete', [
        ProfileController::class,
        'completeUpdate',
    ])->name('profile.complete.update');
});


/*
|--------------------------------------------------------------------------
| Authenticated + Profile Completed Routes
|--------------------------------------------------------------------------
|
| Semua fitur utama aplikasi hanya dapat digunakan setelah
| user menyelesaikan biodata.
|
*/
 Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::middleware([
    'auth',
    'profile.completed',
])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Dashboard
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');


    /*
    |--------------------------------------------------------------------------
    | Apply
    |--------------------------------------------------------------------------
    */

   
Route::get('/apply', [ApplyController::class, 'index'])
    ->middleware('auth')
    ->name('apply.index');

    Route::post('/send', [ApplyController::class, 'send'])
        ->name('apply.send');


    /*
    |--------------------------------------------------------------------------
    | History
    |--------------------------------------------------------------------------
    */

    Route::patch(
        '/history/{id}/status',
        [ApplyController::class, 'updateStatus']
    )->name('history.update-status');

    Route::delete(
        '/history/{id}',
        [ApplyController::class, 'destroyHistory']
    )->name('history.destroy');

    Route::get(
        '/history/resend/{id}',
        [ApplyController::class, 'resendHistory']
    )->name('history.resend');


    /*
    |--------------------------------------------------------------------------
    | Files
    |--------------------------------------------------------------------------
    */

    Route::get('/files', [FileController::class, 'index'])
        ->name('files.index');

    Route::post('/files', [FileController::class, 'store'])
        ->name('files.store');

    Route::get(
        '/files/download/{filename}',
        [FileController::class, 'download']
    )->name('files.download');

    Route::delete(
        '/files/{filename}',
        [FileController::class, 'destroy']
    )->name('files.destroy');


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
/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';
