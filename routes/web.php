<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpresaController;

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

Route::resource('empresas', EmpresaController::class);
Route::get('/empresas/pdf', [EmpresaController::class, 'generatePdf'])->name('empresas.pdf');
Route::get('/empresas/json', [EmpresaController::class, 'exportJson'])->name('empresas.json');
