<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});




/*
Route::post('/login', function(Request $request){
    
    return json_encode('this response is from emmanuel login');
});*/
//return all the field to be displayed on the login view
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm']);

//return all the field to be displayed on the register view
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm']);

Route::get('/member', [App\Http\Controllers\User\MemberController::class, 'showMemberForm']);
Route::get('/firsttimer', [App\Http\Controllers\User\FirstTimerController::class, 'showMemberForm']);
//Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
/*Route::get('/home', [App\Http\Controllers\User\HomeController::class, 'index'])->name('home');

Route::get('/dash', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dash');
Route::get('/department', [App\Http\Controllers\Shared\DepartmentController::class, 'index']);
Route::get('/archive', [App\Http\Controllers\Admin\ArchiveController::class, 'index']);
Route::get('/new_admin', [App\Http\Controllers\Admin\NewadminController::class, 'index']);*/