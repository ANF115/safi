<?php

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

Route::get('/welcome', function () {
    return view('welcome');
    
});

Route::get('/index', function () {
    return view('index');
    
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


/* -------------- VISTAS DEL ADMIN---------------------- */
Route::middleware(['auth', 'isAdmin'])->group(function () {

   /* Route::view('/registrarDatos', 'registro.registrar')->name('registrar');*/

});




