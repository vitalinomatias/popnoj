<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaisController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\EjeController;
use App\Http\Controllers\InstitucionController;
use App\Http\Controllers\MunicipioController;
use App\Http\Controllers\PoblacionController;
use App\Http\Controllers\TipoController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\ReportusersController;

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

// rutas para los paises
Route::resource('paises', PaisController::class)->middleware('auth');
Route::get('pdfpaises', [PaisController::class, 'imprimir'])->name('paises.imprimir')->middleware('auth');

// rutas para departamentos
Route::resource('departamentos', DepartamentoController::class)->middleware('auth');
Route::get('pdfdepartamentos', [DepartamentoController::class, 'imprimir'])->name('departamentos.imprimir')->middleware('auth');

// rutas para los ejes
Route::resource('ejes', EjeController::class)->middleware('auth');
Route::get('pdfejes', [EjeController::class, 'imprimir'])->name('ejes.imprimir')->middleware('auth');

// rutas para los municipios
Route::resource('municipios', MunicipioController::class)->middleware('auth');
Route::get('pdfmunicipios', [MunicipioController::class, 'imprimir'])->name('municipios.imprimir')->middleware('auth');

// rutas para las poblaciones
Route::resource('poblaciones', PoblacionController::class)->middleware('auth');
Route::get('pdfpoblaciones', [PoblacionController::class, 'imprimir'])->name('poblaciones.imprimir')->middleware('auth');

// rutas para los tipos de instituciones
Route::resource('tipos', TipoController::class)->middleware('auth');
Route::get('pdftipos', [TipoController::class, 'imprimir'])->name('tipos.imprimir')->middleware('auth');

// rutas para los usuarios
Route::resource('usuarios', UsuariosController::class)->middleware('auth');

// rutas para los roles de usuarios
Route::resource('roles', RolesController::class)->middleware('auth');

// rutas para las instituciones
Route::resource('instituciones', InstitucionController::class)->middleware('auth');
Route::patch('/instituciones/poblacion/{institucione}', [InstitucionController::class, 'storepoblacion'])->name('institucion.poblacion')->middleware('auth');
Route::patch('/instituciones/eje/{institucione}', [InstitucionController::class, 'storeeje'])->name('institucion.eje')->middleware('auth');
Route::patch('/instituciones/cobertura/{institucione}', [InstitucionController::class, 'storecobertura'])->name('institucion.cobertura')->middleware('auth');
Route::patch('/instituciones/poblacion/{institucione}/eliminar/{id_poblacion}', [InstitucionController::class, 'destroypoblacion'])->name('institucion.poblacion_eliminar')->middleware('auth');
Route::patch('/instituciones/eje/{institucione}/eliminar/{id_eje}', [InstitucionController::class, 'destroyeje'])->name('institucion.eje_eliminar')->middleware('auth');
Route::get('pdfinstituciones', [InstitucionController::class, 'imprimir'])->name('instituciones.imprimir')->middleware('auth');
Route::get('pdfinstituciones/{institucione}', [InstitucionController::class, 'imprimirIndividual'])->name('institucion.imprimir')->middleware('auth');


Route::get('PDFusuarios','App\Http\Controllers\UsuariosController@imprimir')->name('descargarPDFusuarios');
