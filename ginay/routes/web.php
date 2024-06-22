<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UmkmController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ContactUsController;
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

Route::get('/', [Controller::class,'welcome'])->name('welcome');

Route::get('/', [Controller::class,'welcome'])->name('welcome');
Route::get('/login', [LoginController::class,'index'])->name('login');
Route::post('/login-proses', [LoginController::class,'login_proses'])->name('login-proses');
Route::get('/logout', [LoginController::class,'logout'])->name('logout');

Route::get('/register', [LoginController::class,'register'])->name('register');
Route::post('/register-proses', [LoginController::class,'register_proses'])->name('register-proses');


Route::get('/index', [HomeController::class, 'index'])->name('index');
Route::get('/create', [HomeController::class, 'create'])->name('create');
Route::post('/store', [HomeController::class, 'store'])->name('store');

Route::get('/edit/{id}', [HomeController::class, 'edit'])->name('edit');
Route::put('/update/{id}', [HomeController::class, 'update'])->name('update');
Route::delete('/delete/{id}', [HomeController::class, 'delete'])->name('delete');

Route::group(['prefix' => 'apa','middleware' => ['auth'],'as' => 'apa.'], function(){
    Route::get('/Home', [UmkmController::class,'welcome'])->name('welcome');
    Route::get('/gallery/{gallery}', [UmkmController::class, 'showGallery'])->name('gallery');
});

Route::group(['prefix' => 'umkm','middleware' => ['auth'],'as' => 'umkm.'], function(){
    //Profile
    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
    Route::get('/profile/{id}', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::match(['put', 'patch'], '/update/{id}', [ProfileController::class, 'update'])->name('profile.update');
});

Route::group(['prefix' => 'lina','middleware' => ['auth'],'as' => 'lina.'], function(){
Route::get('/contact-us', [ContactUsController::class, 'index'])->name('contact-us.index');
Route::get('/contact-us/create', [ContactUsController::class, 'create'])->name('contact-us.create');
Route::post('/contact-us/store', [ContactUsController::class, 'store'])->name('contact-us.store');
Route::get('/contact-us/{id}/edit', [ContactUsController::class, 'edit'])->name('contact-us.edit');
Route::put('/contact-us/{id}/update', [ContactUsController::class, 'update'])->name('contact-us.update');
Route::delete('/contact-us/{id}/delete', [ContactUsController::class, 'destroy'])->name('contact-us.destroy');
});