<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\ProfileController;
require_once __DIR__.'/admin.php';
require_once __DIR__.'/customer.php';
/* Route::get('/', function () {
    return view('authentication.login');
}); */
Route::redirect('/', 'login');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
//google gihub login


Route::get('/auth/{provider}/redirect',[SocialController::class,'redirect'])->name('sociallogin');

Route::get('/auth/{provider}/callback', [SocialController::class,'callback'])->name('socialcallback');

//
