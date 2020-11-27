<?php
use App\Http\Controllers\Auth\LoginController as AuthLoginController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\checkoutController;
use App\Http\Controllers\CouponController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
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
    Route::get('/shop/{product:slug}',[ShopController::class,'show'])->name('shop.show')->middleware('checkLocaleProduct');
    Route::get('/category/{slug:slug}',[ShopController::class,'getProByCat'])->name('getProByCat');
    Route::get('/nation/{slug:slug}',[ShopController::class,'getProByNat'])->name('getProByNat');
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

//Login
  Route::get('/Logout', [LoginController::class,'Logout'])->name('Logout');


//Profile
//Route::get('/profile/{name:name}', [ProfileController::class,'show'])->name('profile.show')->middleware('CheckLogin');
Route::middleware('auth')->group(function(){
  Route::get('/profile', [ProfileController::class,'edit'])->name('profile.edit');
  Route::post('/profile/{id}', [ProfileController::class,'update'])->name('profile.update');
});

Route::middleware('CheckAdminLogin')->group(function(){
  Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');
  Route::get('/dashboard/product', [DashboardController::class,'showproduct'])->name('dashboard.product');
  Route::get('/dashboard/blog', [DashboardController::class,'showblog'])->name('dashboard.blog');
  Route::get('/dashboard/comment', [DashboardController::class,'showcomment'])->name('dashboard.comment');
  Route::get('/dashboard/catelog', [DashboardController::class,'showcatelog'])->name('dashboard.catelog');
  Route::get('/dashboard/catelog_product', [DashboardController::class,'showcatelog_product'])->name('dashboard.catelog_product');
  Route::get('/dashboard/catelog_blog', [DashboardController::class,'showcatelog_blog'])->name('dashboard.catelog_blog');
  Route::get('/dashboard/tags', [DashboardController::class,'showtags'])->name('dashboard.tags');
  Route::get('/dashboard/banner', [DashboardController::class,'showbanner'])->name('dashboard.banner');
  Route::get('/dashboard/coupon', [DashboardController::class,'showcoupon'])->name('dashboard.coupon');
  Route::get('/dashboard/language', [DashboardController::class,'showlanguage'])->name('dashboard.language');
  Route::get('/dashboard/order', [DashboardController::class,'showorder'])->name('dashboard.order');
  Route::get('/dashboard/orderdetail', [DashboardController::class,'showorderdetail'])->name('dashboard.orderdetail');
  Route::get('/dashboard/user', [DashboardController::class,'showuser'])->name('dashboard.user');
  Route::get('/dashboard/AdminUser', [DashboardController::class,'showAdminUser'])->name('dashboard.AdminUser');
  Route::get('/dashboard/Passreset', [DashboardController::class,'showPassreset'])->name('dashboard.Passreset');
});

  Route::get('/checkout',[checkoutController::class,'index'])->name('checkout.index');

//contact
  Route::get('/contact', [ContactController::class,'index'])->name('contact');
  Route::post('/contact',[ContactController::class,'sendMail'])->name('contact.sendMail');
  Route::get('manager-admin', );

  Auth::routes();
