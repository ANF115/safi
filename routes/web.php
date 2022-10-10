<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

/* -------------- VISTAS DEL ADMIN---------------------- */
Route::middleware(['auth', 'isUser'])->group(function () {

   /* Route::view('/registrarDatos', 'registro.registrar')->name('registrar');*/
 
 });




