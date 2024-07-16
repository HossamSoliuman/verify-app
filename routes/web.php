<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TempFileController;
use App\Http\Controllers\VerificationCodeController;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// dnu123@dradni.co.uk
// Password - Freelancer2023!

Auth::routes([
    'register' => false
]);

Route::post('temp/store', [TempFileController::class, 'store'])->name('upload');

Route::middleware('auth')->group(function () {
    Route::get('/home', function () {
        return to_route('home');
    });
    Route::get('create-code', [VerificationCodeController::class, 'create'])->name('home');
    Route::get('logout', [LoginController::class, 'logout']);

    Route::post('generate-code', [VerificationCodeController::class, 'generate'])->name('code.store');
});

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('login/azure', [LoginController::class, 'redirectToAzure']);
Route::get('callback', [LoginController::class, 'handleAzureCallback']);

Route::get('login/google', [LoginController::class, 'redirectToGoogle']);
Route::get('google-callback', [LoginController::class, 'handleGoogleCallback']);
