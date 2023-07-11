<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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


Auth::routes();
Route::get('/', [App\Http\Controllers\Auth\LoginController::class, 'showLoginPage']);
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginPage'])->name('showlogin');
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationPage'])->name('showregister');
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'store']);

Route::get('/home', [App\Http\Controllers\User\HomeController::class, 'index'])->name('home');
//Route::post('/register2', [App\Http\Controllers\User\FirstTimerController::class, 'store']);
Route::post('/registerp',function(Request $request){
    dd($request->all());
});
/*
Route::get('/dash', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dash');
Route::get('/department', [App\Http\Controllers\Shared\DepartmentController::class, 'index']);
Route::get('/archive', [App\Http\Controllers\Admin\ArchiveController::class, 'index']);
Route::get('/new_admin', [App\Http\Controllers\Admin\NewadminController::class, 'index']);
//->middleware('is_admin');*/

