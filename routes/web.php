<?php

use App\Http\Controllers\KontakController;
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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('kontak', KontakController::class);

// Controller Profile User
// Page Profile
Route::group(['middleware' => 'auth'], function () {
    // Update Profile
    Route::get('profile', [App\Http\Controllers\PageController::class, 'profile'])->name('profile');

    Route::patch('profile/update', [App\Http\Controllers\PageController::class, 'update'])->name('profile.update');

    // Ubah Password Profile
    Route::get('resetpassword', [App\Http\Controllers\PageController::class, 'password'])->name('profile.password');

    Route::patch('profile/ubah password', [App\Http\Controllers\PageController::class, 'reset'])->name('profile.reset');
});

