<?php

use App\Http\Controllers\TarefasController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('tarefas/index', [TarefasController::class, 'index'])->name('tarefas.index');
Route::get('tarefas/criar', [TarefasController::class, 'criar'])->name('tarefas.criar');
Route::get('tarefas/editar/{id}', [TarefasController::class, 'editar'])->name('tarefas.editar');
Route::post('tarefas/armazenar', [TarefasController::class, 'armazenar'])->name('tarefas.armazenar');
Route::put('tarefas/atualizar', [TarefasController::class, 'atualizar'])->name('tarefas.atualizar');
