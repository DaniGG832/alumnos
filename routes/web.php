<?php

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\CceeController;
use App\Http\Controllers\NotaController;
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



/* 
parameters

Route::resource("niveles", "NivelesController")->parameters(["niveles"=>"nivel"]); 
*/


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::resource('alumnos',AlumnoController::class)->middleware(['auth']);

Route::resource('ccees',CceeController::class)->middleware(['auth']);

Route::resource('notas',NotaController::class)->middleware(['auth']);

Route::post('alumnos/addnota',[NotaController::class,'store'])->middleware(['auth'])->name('alumnos.nota');