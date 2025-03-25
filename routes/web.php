<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpresaController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('empresas', EmpresaController::class);
Route::get('/empresas/pdf', [EmpresaController::class, 'generatePdf'])->name('empresas.pdf');
Route::get('/empresas/json', [EmpresaController::class, 'exportJson'])->name('empresas.json');
