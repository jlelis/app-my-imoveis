<?php

use App\Http\Controllers\CidadeController;
use App\Http\Controllers\ImovelController;
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

Route::resource('imoveis', ImovelController::class);


Route::get('/', function () {
    return view('welcome');
});
