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
    
   Route::view('/Lista-Empresas', 'gestionar.empresas')->name('listEmpresas');

});

/* -------------- VISTAS DEL ADMIN---------------------- */
Route::middleware(['auth', 'isUser'])->group(function () {
   
   Route::view('/Catálogo-Cuentas', 'catalogo.catalogo-manual')->name('catalogoCuentas'); 
   Route::view('/Catálogo-Registro', 'catalogo.registro')->name('catalogoRegistro');

   Route::view('/Cuentas-Mayores', 'cuentas.registrar-cmayores')->name('cuentasMay');
   Route::view('/Cuentas', 'cuentas.registro-cuentas')->name('cuentas');
   Route::view('/SubCuentas', 'cuentas.registro-subcuentas')->name('subcuentas');

   Route::view('/Opciones-Estados', 'estados.opciones-estados')->name('opcionesEstados');
   Route::view('/Cargar-Estados', 'estados.cargar-estados')->name('cargarEstados');
   Route::view('/Registrar-Estados', 'estados.registrar-estados')->name('registrarEstados');
   Route::view('/Configuar-Cuentas', 'cuentas.configurar')->name('configurarCuentas');
   Route::view('/Analisis-Ratios', 'analisis.analisis-ratios')->name('analisisRatios');
   Route::view('/Comparacion-Empresas', 'analisis.comparacion-empresas')->name('comparacionEmpresas');
 
 });




