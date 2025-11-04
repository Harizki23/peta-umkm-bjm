<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LoginController2;
use App\Http\Controllers\UMKMController;
use App\Http\Controllers\UMKMController2;
use App\Models\UMKM;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login', ['type_menu' => '']);
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/login2', [LoginController2::class, 'showLoginForm2'])->name('login2');
Route::post('/login2', [LoginController2::class, 'login2']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

Route::get('/dashboard', [UMKMController::class, 'showDashboard'])->middleware('auth')->name('dashboard');
Route::resource('umkm', UMKMController2::class);
Route::get('/umkm/index', [UMKMController2::class, 'index'])->middleware('auth')->name('dashboard2');
Route::get('/umkm', [UMKMController2::class, 'index'])->middleware('auth')->name('dashboard3');