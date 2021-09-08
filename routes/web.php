<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaisController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\EjeController;
use App\Http\Controllers\InstitucionController;
use App\Http\Controllers\MunicipioController;
use App\Http\Controllers\PoblacionController;
use App\Http\Controllers\TipoController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('paises', PaisController::class)
->middleware('auth');

Route::resource('departamentos', DepartamentoController::class)
->middleware('auth');

Route::resource('ejes', EjeController::class)
->middleware('auth');

Route::resource('instituciones', InstitucionController::class)
->middleware('auth');

Route::resource('municipios', MunicipioController::class)
->middleware('auth');

Route::resource('poblaciones', PoblacionController::class)
->middleware('auth');

Route::resource('tipos', TipoController::class)
->middleware('auth');