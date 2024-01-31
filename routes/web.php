<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Auth\AuthController;
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

Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard'); 

Route::get('logout', [AuthController::class, 'logout'])->name('logout');