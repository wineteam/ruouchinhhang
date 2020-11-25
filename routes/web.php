<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
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
  Route::redirect('/','vn');
  Route::get('language/{language}', function ($language){
    session()->put('language',$language);
  return redirect()->back();
  })->name('setLanguage');
    Route::get('/', [HomePageController::class,'index'])->name('home');
    Route::get('/shop',[ShopController::class,'index'])->name('shop');
    Route::get('shop/tag/{tag:slug}',[ShopController::class,'searchWithTag'])->name('shop.search.tag');
    Route::get('/shop/{product:slug}',[ShopController::class,'show'])->name('shop.show')->middleware('checkLocaleProduct');

    Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
    Route::get('/blog/{blog:slug}', [BlogController::class, 'show'])->name('blog.show');

    Route::post('blog/search', [BlogController::class, 'search'])->name('blog.search');
    Route::get('blog/tag/{tag:slug}',[BlogController::class,'searchWithTag'])->name('blog.search.tag');

    Route::get('blog/category/{slug:slug}',[BlogController::class,'getBlogByCat'])->name('blog.search.categories');

    Route::get('/checkout', function () {
        return view('client.checkout');
    })->name('checkout');
    Route::get('/profile', function () {
        return view('client.profile');
    })->name('profile');

    Route::get('/change', function () {
        return view('client.changePassword');
    })->name('change');
    Route::get('/cart',[CartController::class,'index'])->name('cart.index');
    Route::post('/cart',[CartController::class,'store'])->name('cart.store');
    Route::get('category/{slug:slug}',[ShopController::class,'getProByCat'])->name('getProByCat');
    Route::get('/contact', [ContactController::class,'index'])->name('contact');
    Route::get('manager-admin', );

    Route::get('/getPrice',[ShopController::class,'getPrice']);
    Auth::routes();
