<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\UserController;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Group;
use Illuminate\Support\Facades\Auth;
use  App\Http\Controllers\ProductController;
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

Route::get('/', function () {
    return view('auth.login');
});

//Route::get('/user/index',[userController::class,'index']);
//Route::get('/user/create',[userController::class,'create']);
//Route::get('/user/edit',[userController::class,'edit']);

Auth::routes();

Route::group(['middleware' => 'auth'], function() {
    Route::get('/', [UserController::class, 'index'])->name('home');
    Route::get('/home', [UserController::class, 'index'])->name('home');
    Route::resource('user',UserController::class);
    Route::resource('product',ProductController::class);
});
