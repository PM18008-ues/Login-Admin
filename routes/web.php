<?php

use App\Http\Controllers\HolidaysController;
use App\Http\Controllers\LoginController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('holidays', [HolidaysController::class, 'index']);

Route::view('/login', "login")->name('login');
Route::view('/registro', "register")->name('registro');
Route::view('/privada', "secret")->middleware('auth')->name('privada');
Route::view('/privada/nuevo-usuario', "newUser")->middleware('auth')->name('nuevo-usuario');

Route::post('/validar-registro', [LoginController::class, 'register'])->name('validar-registro');
Route::post('/inicia-sesion', [LoginController::class, 'login'])->name('inicia-sesion');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('privada', [LoginController::class, 'show'])->middleware('auth')->name('privada');
Route::delete('/borrar-{id}', [LoginController::class, 'delete'])->name('borrar-usuario');
