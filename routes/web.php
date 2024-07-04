<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\AngkatanController;
use Illuminate\Support\Facades\Auth;

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
    return view('welcome');
});



Route::resource('mahasiswas', MahasiswaController::class)->middleware('auth');
Route::resource('kelass', KelasController::class)->middleware('auth');
Route::put('/kelass/{kelas}', 'KelasController@update')->name('kelass.update');
Route::delete('/kelass/{kelas}', 'KelasController@destroy')->name('kelass.destroy');
Route::resource('mata_kuliahs', MataKuliahController::class)->middleware('auth');
Route::resource('semesters', SemesterController::class)->middleware('auth');
Route::resource('nilais', NilaiController::class)->middleware('auth');
Route::resource('angkatans', AngkatanController::class)->middleware('auth');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    // Hanya pengguna yang terautentikasi yang bisa mengakses
})->middleware('auth');
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/user/detail', [App\Http\Controllers\UserController::class, 'getUserDetail'])->name('user.detail')->middleware('auth');
