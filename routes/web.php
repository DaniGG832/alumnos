<?php

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\CceeController;
use App\Http\Controllers\NotaController;
use Illuminate\Routing\RouteGroup;
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



Route::resource('alumnos',AlumnoController::class)->middleware(['auth','can:solo-admin']);



Route::middleware(['auth'])->group(function () {
    
    //Route::resource('alumnos',AlumnoController::class);
    
    
    
    Route::resource('ccees',CceeController::class);
    
    
    Route::post('alumnos/{alumno}/addnota',[NotaController::class,'store'])->name('alumnos.store');
    
    Route::get('alumnos/{alumno}/edit',[NotaController::class,'edit'])->name('alumnos.edit');
    Route::put('alumnos/{alumno}/addnota',[NotaController::class,'update'])->name('alumnos.addnota');
    
    Route::resource('notas',NotaController::class);









});