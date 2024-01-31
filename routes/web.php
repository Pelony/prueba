<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\InmobiliariaController;

/*use App\Http\Controllers\LoginController;
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',function(){
    return view('welcome');
});
Route::get('login', [AuthController::class, 'index'])->name('login');

Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 

Route::get('registration', [AuthController::class, 'registration'])->name('register');

Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 

 

Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('ver', [InmobiliariaController::class, 'mostrar'])->name('ver');

Route::get('crear', [InmobiliariaController::class, 'crearVista'])->name('crear'); 
Route::post('post-crear', [InmobiliariaController::class, 'store'])->name('crear.post'); 
Route::get('showAll', [InmobiliariaController::class, 'showAll'])->name('showAll'); 
Route::get('show/{id}', [InmobiliariaController::class, 'show'])->name('crud.show'); 
Route::get('show/{id}/edit', [InmobiliariaController::class, 'edit'])->name('crud.edit');

Route::put('show/{id}', [InmobiliariaController::class, 'update'])->name('crud.update');

Route::delete('show/{id}', [InmobiliariaController::class, 'destroy'])->name('crud.delete');



