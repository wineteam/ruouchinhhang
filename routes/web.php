<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomePageController;
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

Route::get('/',[HomePageController::class,'index'])->name('home');
Route::get('/shop', function (){
    return view('client.products');
})->name('shop');
Route::get('/blog', function(){
    return view('client.blog');
})->name('blog');

Route::get('/checkout', function (){
    return view('client.checkout');
})->name('checkout');

Route::get('/contact',[ContactController::class,'index'])->name('contact');
Route::get('manager-admin',);
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
