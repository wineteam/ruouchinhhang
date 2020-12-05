<?php

use App\Http\Controllers\admin\MngCateLogController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\checkoutController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\admin\MngUserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\admin\MngAdminUserController;
use App\Http\Controllers\admin\MngBannerController;
use App\Http\Controllers\admin\MngBlogController;
use App\Http\Controllers\admin\MngCateLogBlogController;
use App\Http\Controllers\admin\MngCateLogProDuctController;
use App\Http\Controllers\admin\MngCommentController;
use App\Http\Controllers\admin\MngCouponController;
use App\Http\Controllers\admin\MngLanguageController;
use App\Http\Controllers\admin\MngOrderController;
use App\Http\Controllers\admin\MngOrderDetailController;
use App\Http\Controllers\admin\MngPassResetController;
use App\Http\Controllers\admin\MngProductController;
use App\Http\Controllers\admin\MngTagsController;
use App\Http\Controllers\ProfileController;

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
//  shop
  Route::middleware('passDataForShopPage')->group(function () {
    Route::get('/shop',[ShopController::class,'index'])->name('shop');
    Route::get('shop/tag/{tag:slug}',[ShopController::class,'searchWithTag'])->name('shop.search.tag');
    Route::get('/shop/product/{product:slug}',[ShopController::class,'show'])->name('shop.show')->middleware('checkLocaleProduct');
    Route::get('/shop/category/{slug:slug}',[ShopController::class,'getProByCat'])->name('getProByCat');
    Route::get('/shop/nation/{slug:slug}',[ShopController::class,'getProByNat'])->name('getProByNat');
    Route::get('/shop/searchByName',[ShopController::class,'searchByName'])->name('shop.searchByName');
    Route::get('/shop/search',[ShopController::class,'filterProducts'])->name('shop.filters');
  });
//  cart
  Route::get('/cart',[CartController::class,'index'])->name('cart.index');
  Route::post('/cart',[CartController::class,'store'])->name('cart.store');
  Route::delete('cart/{product}',[CartController::class,'destroy'])->name('cart.destroy');
//blog
  Route::middleware('passDataForBLogPage')->group(function (){
    Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
    Route::get('/blog/{blog:slug}', [BlogController::class, 'show'])->name('blog.show');

    Route::post('blog/search', [BlogController::class, 'search'])->name('blog.search');
    Route::get('blog/tag/{tag:slug}',[BlogController::class,'searchWithTag'])->name('blog.search.tag');
    Route::get('blog/category/{slug:slug}',[BlogController::class,'getBlogByCat'])->name('blog.search.categories');
  });
//coupon
  Route::post('/coupon',[CouponController::class,'store'])->name('coupon.store');
  Route::delete('/coupon/destroy',[CouponController::class,'destroy'])->name('coupon.destroy');

//Logout
  Route::get('/Logout', [LoginController::class,'Logout'])->name('Logout');


//Profile
//Route::get('/profile/{name:name}', [ProfileController::class,'show'])->name('profile.show')->middleware('CheckLogin');
Route::middleware('auth')->group(function(){
  Route::get('/profile', [ProfileController::class,'edit'])->name('profile.edit');
  Route::post('/profile/{id}', [ProfileController::class,'update'])->name('profile.update');
});

Route::middleware('CheckAdminLogin')->group(function(){

  Route::get('/admin/dashboard', [DashboardController::class,'index'])->name('dashboard.index');
//ADMIN - CATELOG
  Route::get('/admin/categories', [MngCateLogController::class,'index'])->name('MngCateLog.index');
//ADMIN - CATELOG_PRODUCTS
  Route::get('/dashboard/categories_products', [MngCateLogProDuctController::class,'index'])->name('MngCateLogProDuct.index');
//ADMIN - CATELOG_BLOGS
  Route::get('/dashboard/categories_blogs', [MngCateLogBlogController::class,'index'])->name('MngCateLogBlog.index');
//ADMIN - TAGS
  Route::get('/dashboard/tags', [MngTagsController::class,'index'])->name('MngTags.index');
//ADMIN - PRODUCTS
  Route::get('/dashboard/product', [MngProductController::class,'index'])->name('MngProduct.index');
  Route::get('/dashboard/product/search', [MngProductController::class,'search'])->name('MngProduct.search');
  Route::get('/dashboard/product/order={order}', [MngProductController::class,'orderPro'])->name('MngProduct.order');
//ADMIN - PRODUCTS - CREATES
  Route::get('/dashboard/product/create', [MngProductController::class,'create'])->name('MngProduct.create');
  Route::post('/dashboard/product/store', [MngProductController::class,'store'])->name('MngProduct.store');
//ADMIN - PRODUCTS - EIDTS
  Route::get('/dashboard/product/edit/{id}', [MngProductController::class,'edit'])->name('MngProduct.edit');
  Route::patch('/dashboard/product/update/{id}', [MngProductController::class,'update'])->name('MngProduct.update');
//ADMIN - PRODUCTS - DELETE
  Route::delete('/dashboard/product/delete/{id}',[MngProductController::class,'destroy'])->name('MngProduct.destroy');//Xóa người dùng
  Route::delete('/dashboard/product/DeleteAll', [MngProductController::class,'deleteAll'])->name('MngProduct.deleteAll');
//ADMIN - BLOGS
  Route::get('/dashboard/blog', [MngBlogController::class,'index'])->name('MngBlog.index');
//ADMIN - BLOGS - create
  Route::get('/dashboard/blog/create', [MngBlogController::class,'create'])->name('MngBlog.create');
//ADMIN - BLOGS - DELETE
  Route::delete('/dashboard/blog/delete/{id}',[MngBlogController::class,'destroy'])->name('MngBlog.destroy');//Xóa bài viết
//ADMIN - COUPONS
  Route::get('/dashboard/coupon', [MngCouponController::class,'index'])->name('MngCoupon.index');
//ADMIN - COMMENTS
  Route::get('/dashboard/comment', [MngCommentController::class,'index'])->name('MngComment.index');
// ADMIN - APPROVE -COMMENT
  Route::patch('/dashboard/comment/{id}/approved', [MngCommentController::class,'approvedComment'])->name('MngComment.approved');
//  ADMIN - DELETE - COMMENT
  Route::delete('/dashboard/comment/{comment}/delete', [MngCommentController::class,'destroy'])->name('MngComment.delete');
  //  ADMIN - DELETEAll - COMMENT
  Route::delete('/dashboard/comment/deleteAll', [MngCommentController::class,'deleteAll'])->name('MngComment.deleteAll');
//ADMIN - BANNERS
  Route::get('/dashboard/banner', [MngBannerController::class,'index'])->name('MngBanner.index');
  Route::get('/dashboard/banner/search', [MngBannerController::class,'search'])->name('MngBanner.search');
  Route::get('/dashboard/banner/order={order}', [MngBannerController::class,'orderPro'])->name('MngBanner.order');
//Xóa All người dùng
  Route::delete('/dashboard/banner/DeleteAll', [MngBannerController::class,'deleteAll'])->name('MngBanner.deleteAll');
//ADMIN - USERS - CREATES
  Route::get('/dashboard/banner/create', [MngBannerController::class,'create'])->name('MngBanner.create');
  Route::post('/dashboard/banner/store', [MngBannerController::class,'store'])->name('MngBanner.store');
//ADMIN - LANGUAGES
  Route::get('/dashboard/language', [MngLanguageController::class,'index'])->name('MngLanguage.index');
//ADMIN - USERS
  Route::get('/dashboard/user', [MngUserController::class,'index'])->name('MngUser.index');
  Route::get('/dashboard/user/search', [MngUserController::class,'search'])->name('MngUser.search');
  Route::get('/dashboard/user/order={order}', [MngUserController::class,'orderPro'])->name('MngUser.order');
//ADMIN - USERS - CREATES
  Route::get('/dashboard/user/create', [MngUserController::class,'create'])->name('MngUser.create');
  Route::post('/dashboard/user/store', [MngUserController::class,'store'])->name('MngUser.store');
//ADMIN - USERS - EIDTS
  Route::get('/dashboard/user/edit/{id}', [MngUserController::class,'edit'])->name('MngUser.edit');
  Route::patch('/dashboard/user/update/{id}', [MngUserController::class,'update'])->name('MngUser.update');
//ADMIN - USERS - DELETE
  Route::delete('/dashboard/user/delete/{id}',[MngUserController::class,'destroy'])->name('MngUser.destroy');
//Xóa All người dùng
  Route::delete('/dashboard/user/DeleteAll', [MngUserController::class,'deleteAll'])->name('MngUser.deleteAll');
//ADMIN - ORDERS
  Route::get('/dashboard/order', [MngOrderController::class,'index'])->name('MngOrder.index');
//ADMIN - ORDERS_DETAILS
  Route::get('/dashboard/orderDetail', [MngOrderDetailController::class,'index'])->name('MngOrderDetail.index');


});

  Route::get('/checkout',[checkoutController::class,'index'])->name('checkout.index');

//contact
  Route::get('/contact', [ContactController::class,'index'])->name('contact');
  Route::post('/contact',[ContactController::class,'sendMail'])->name('contact.sendMail');
  Route::get('manager-admin', );

  Auth::routes();
