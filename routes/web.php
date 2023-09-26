<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Frontend\IndexController;

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

Route::get('/', [IndexController::class, 'index'])->name('admin.index');

Route::group(['prefix'=> 'admin', 'middleware'=>['admin:admin']], function(){
	Route::get('/login', [AdminController::class, 'loginForm'])->name('admin.loginForm');
	Route::post('/login',[AdminController::class, 'store'])->name('admin.login');

});

Route::group(['prefix'=> 'admin', 'middleware'=>['auth:sanctum,admin', 'verified']], function(){
	Route::get('logout', [AdminController::class, 'destroy'])->name('admin.logout');
	Route::get('profile', [AdminProfileController::class, 'AdminProfile'])->name('admin.profile');
	Route::post('profile', [AdminProfileController::class, 'AdminProfileUpdate'])->name('admin.profileUpdate');
	Route::post('profile/up-pass', [AdminProfileController::class, 'AdminPasswordUpdate'])->name('admin.passwordUpdate');

});



Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('dashboard');



Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('frontend.main_master');
})->name('dashboard');
