<?php

use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Backend\backendController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();




 Route::group(['prefix' => 'admin/'], function () {
    Route::get('showPage',[AdminLoginController::class,'showLoginForm'])->name('loginForm');
    Route::post('login',[AdminLoginController::class,'login'])->name('admin.login');
    Route::resource('adminPage',backendController::class);
    Route::get('ssd',[backendController::class,'ssd']);

    Route::get('addUser',[backendController::class,'addUser'])->name('addUser');
    Route::any('/data/{id}', [backendController::class,'destory'])->name('data.delete');


 });

//  Route::get('chat',[backendController::class,'chat'])->name('chat');
 
 