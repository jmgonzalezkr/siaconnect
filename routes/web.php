<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\cargarController;
//use App\Http\Controllers\Auth;
use App\Http\Controllers\filesController;
use App\Http\Controllers\recursoController;
use App\Http\Controllers\bibliotecaController;
use App\Http\Controllers\estudianteController;
use App\Http\Controllers\panelController;
use Illuminate\Routing\Route as RoutingRoute;
use Symfony\Component\Routing\Annotation\Route as AnnotationRoute;

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



Route::get('/', [App\Http\Controllers\estudianteController::class, 'index'])->name('estudiante');

//Route::get('cargar', [cargarController::class, 'index']);

//Route::get('cargar', [cargarController::class, 'list'])->name('cargar.list');

//Route::post('cargar', [cargarController::class, 'store'])->name('cargar.store');

//Route::get('upload', [cargarController::class, 'upload'])->name('upload.upload');

//Route::post('upload', [FilesController::class, 'store'])->name('upload.store');

//Route::delete('cargar/{file}', [FilesController::class, 'destroy'])->name('cargar.destroy');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('panel_control');

Route::get('/recurso', [App\Http\Controllers\recursoController::class, 'index'])->name('recurso');

Route::get('/biblioteca', [App\Http\Controllers\bibliotecaController::class, 'index'])->name('biblioteca');

Route::get('/estudiante', [App\Http\Controllers\estudianteController::class, 'index'])->name('estudiante');

Route::get('/panel', [App\Http\Controllers\panelController::class, 'index'])->name('panel.index');




Route::get('recurso', [recursoController::class, 'index'])->name('recurso.index');

Route::post('recurso',[recursoController::class, 'store'])->name('recurso.store');

Route::delete('recurso/{resultado}',[recursoController::class, 'destroy'])->name('recurso.destroy');

Route::post('recurso/{resultado}',[recursoController::class, 'extract'])->name('recurso.extract');


Route::post('recurso-edit',[recursoController::class, 'edit'])->name('recurso-edit.edit');

Route::post('recurso-edit/{recurso}',[recursoController::class, 'edit'])->name('recurso-edit.edit');

Route::post('renombar',[recursoController::class, 'rename'])->name('renombrar.rename');


Route::get('home', [FilesController::class, 'index'])->name('home.index');

Route::post('home', [FilesController::class, 'store'])->name('home.store');

Route::delete('home/{file}', [FilesController::class, 'destroy'])->name('home.destroy');



Route::get('biblioteca', [bibliotecaController::class, 'index'])->name('biblioteca.index');

Route::post('biblioteca',[bibliotecaController::class, 'store'])->name('biblioteca.store');

Route::delete('biblioteca/{libro}', [bibliotecaController::class, 'destroy'])->name('biblioteca.destroy');


Route::get('estudiante', [estudianteController::class, 'index'])->name('estudiante.index');

Route::get('estrecurso', [estudianteController::class, 'recurso'])->name('estrecurso.recurso');

Route::get('estbiblioteca', [estudianteController::class, 'biblioteca'])->name('estbiblioteca.biblioteca');

Route::get('estlaboratorio', [estudianteController::class, 'laboratorio'])->name('estlaboratorio.laboratorio');

Route::get('estrepositorio', [estudianteController::class, 'rapido'])->name('estrepositorio.rapido');