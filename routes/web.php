<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignUpController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('login');
// })->name('login');

Route::post('/login', [LoginController::class, 'submit'])->name('login.submit');

// // captcha refresh route
// Route::get('/refresh-captcha', function () {
//     $captchaText = app('App\Http\Controllers\LoginController')->generateCaptcha();
//     return response()->json(['captcha' => $captchaText]);
// })->name('refresh.captcha');


// Sign Up Routes
Route::get('/signup', [SignUpController::class, 'show'])->name('signup');
Route::post('/signup', [SignUpController::class, 'submit'])->name('signup.submit');


Route::get('/', [LoginController::class, 'show'])->name('login');
Route::get('/refresh-captcha', function () {
    $captchaText = app('App\Http\Controllers\LoginController')->generateCaptcha();
    return response()->json(['captcha' => $captchaText]);
})->name('refresh.captcha');