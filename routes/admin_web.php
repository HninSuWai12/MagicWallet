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
    Route::get('showPage',[AdminLoginController::class,'showLoginForm']);
    Route::post('login',[AdminLoginController::class,'login'])->name('admin.login');
    Route::get('/',[backendController::class,'index'])->name('backendPAge');
    Route::get('ssd',[backendController::class,'ssd']);


 });

 Route::get('chat',[backendController::class,'chat'])->name('chat');
 
 