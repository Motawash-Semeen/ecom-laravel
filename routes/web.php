<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandsController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\ProfileController;

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

Route::get('/', [IndexController::class, 'index'])->name('index');

Route::group(['prefix'=> 'admin', 'middleware'=>['admin:admin']], function(){
	Route::get('/login', [AdminController::class, 'loginForm'])->name('admin.loginForm');
	Route::post('/login',[AdminController::class, 'store'])->name('admin.login');
	Route::get('/brand-view', [BrandsController::class, 'show'])->name('admin.brands');

});

Route::group(['prefix'=> 'admin', 'middleware'=>['auth:sanctum,admin', 'verified']], function(){
	Route::get('logout', [AdminController::class, 'destroy'])->name('admin.logout');
	Route::get('profile', [AdminProfileController::class, 'AdminProfile'])->name('admin.profile');
	Route::post('profile', [AdminProfileController::class, 'AdminProfileUpdate'])->name('admin.profileUpdate');
	Route::post('profile/up-pass', [AdminProfileController::class, 'AdminPasswordUpdate'])->name('admin.passwordUpdate');
	Route::get('brands', [BrandsController::class, 'show'])->name('admin.brands');
	Route::post('brands/store', [BrandsController::class, 'store'])->name('admin.brands.store');
	Route::get('brands/delete/{id}', [BrandsController::class, 'delete'])->name('admin.brands.delete');
	Route::get('brands/{id}', [BrandsController::class, 'edit'])->name('admin.brands.edit');
});


Route::group([ 'middleware'=>['auth:sanctum,web', 'verified']], function(){
	Route::get('profile', [ProfileController::class, 'show'])->name('user.profile');
	Route::post('profile', [ProfileController::class, 'updateProfile'])->name('user.updateprofile');
	Route::get('user-password', [ProfileController::class, 'passwordForm'])->name('user.password');
	Route::post('user-password', [ProfileController::class, 'updatePassword'])->name('user.passwordupdate');
	

});



Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('admin.dashboard');



Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', [ProfileController::class, 'index'])->name('dashboard');
