<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\sensorControl;

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
// Route::get('/tes', function () {
//     return view('pages.dashboard');
// });    
// Route::get('/tes', [sensorControl::class, 'index'])->name('dashboard');
Route::get('/fresh_suhu', [sensorControl::class, 'fresh_suhu']);
Route::get('/fresh_keruh', [sensorControl::class, 'fresh_keruh']);
Route::get('/fresh_tinggi', [sensorControl::class, 'fresh_tinggi']);
Route::get('/fresh_ph', [sensorControl::class, 'fresh_ph']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
