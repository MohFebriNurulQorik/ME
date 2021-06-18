<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\OrderController;

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


Route::get('/', function(){return redirect('login');});
Route::get('order', [OrderController::class, 'index'])->name('order')->middleware('auth');
Route::get('order_detail', [OrderController::class, 'order_detail'])->name('order_detail')->middleware('auth');
Route::get('order_detail/{id:slug}', [OrderController::class, 'order_detail'])->name('order_detail')->middleware('auth');
Route::get('delete_order/{id}', [OrderController::class, 'delete_order'])->name('delete_order')->middleware('auth');
Route::post('order/store', [OrderController::class, 'store'])->name('order.store')->middleware('auth');
Route::get('test', [OrderController::class, 'test'])->name('test')->middleware('auth');

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
