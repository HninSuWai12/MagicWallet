<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Frontend\frontendController;

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
Route::get('/',[frontendController::class,'home']);
Route::group(['prefix' => 'user/'], function () {
Route::resource('userPage',frontendController::class);
Route::get('ssd',[frontendController::class,'ssd']);

Route::get('addUser',[frontendController::class,'addUser'])->name('user#addUser');
Route::any('/data/{id}', [frontendController::class,'destory'])->name('userData.delete');
});



Route::get('contact-us', [ContactController::class, 'index']);
Route::post('contact-us', [ContactController::class, 'store'])->name('contact.us.store');


 