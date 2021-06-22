<?php

use App\Http\Controllers\CidadeController;
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
Route::resource('cidades', CidadeController::class);
//Route::get('/cidades', [CidadeController::class, 'index'])->name('cidade.index');
//Route::post('/cidades', [CidadeController::class, 'store'])->name('cidade.store');
//Route::get('/cidades/create', [CidadeController::class, 'create'])->name('cidade.create');
//Route::delete('/cidades/{id}', [CidadeController::class, 'destroy'])->name('cidade.destroy');
//Route::get('/cidades/{id}/edit', [CidadeController::class, 'edit'])->name('cidade.edit');
//Route::put('/cidades/{id}', [CidadeController::class, 'update'])->name('cidade.update');


Route::get('/', function () {
    return view('welcome');
});
