<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientecreditosController;
use App\Http\Controllers\Auth\RegisteredUserController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\ProfileController::class, 'index'])->name('dashboard');
    Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');
    Route::get('/adminasesor', [App\Http\Controllers\AdminController::class, 'adminasesor'])->name('adminasesor');
    Route::get('/admingerente', [App\Http\Controllers\AdminController::class, 'admingerente'])->name('admingerente');


    Route::get('/editar-usuario/{id}', [AdminController::class, 'editarUsuario'])->name('editarUsuario');
    Route::put('/actualizar-usuario/{id}', [AdminController::class, 'actualizarUsuario'])->name('actualizarUsuario');
    Route::delete('/eliminar-usuario/{id}', [AdminController::class, 'eliminarUsuario'])->name('eliminarUsuario');

    Route::post('/crear-asesor', [RegisteredUserController::class, 'store'])->name('crear-asesor');

   

    Route::put('/editar-credito/{id}', [ClientecreditosController::class, 'editarCredito'])->name('editar-credito');
    Route::post('/guardar-credito', [ClientecreditosController::class, 'guardarCredito'])->name('guardar-credito');
    Route::get('/ver-creditos', [ClientecreditosController::class, 'index'])->name('ver-creditos');
    Route::get('/solicitar-creditos', [ClientecreditosController::class, 'solicitar'])->name('solicitar-creditos');
    Route::delete('/eliminar-credito', [ClientecreditosController::class, 'eliminarCredito'])->name('eliminar-credito');
    Route::put('/actualizar-estado/{credito}', [ProfileController::class, 'actualizarEstado'])->name('actualizar-estado');

});

require __DIR__.'/auth.php';
