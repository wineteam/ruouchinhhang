<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $products =  Product::all();$users = User::all();$blogs = Blog::all();$categories = Category::all();
        $productsCount = $products->count();$usersCount = $users->count();$blogsCount = $blogs->count();$categoriesCount = $categories->count();

        $blogViews = Blog::select('blogs.*')->where('is_published', '1')->orderBy('view', 'desc')->get();

        return view('admin.main')->with
        ([
            "products"=>$products,"users"=>$users,"blogs"=>$blogs,"categories"=>$categories,"blogViews"=>$blogViews,
            'productsCount'=>$productsCount,"usersCount"=>$usersCount,"blogsCount"=>$blogsCount,"categoriesCount"=>$categoriesCount
        ]);
    }

    public function showblog(){
        return view('admin.blog');
    }

    public function showproduct(){
        return view('admin.product');
    }

    public function showcatelog(){
        return view('admin.catelog');
    }

    public function showcatelog_product(){
        return view('admin.catelog_product');
    }

    public function showcatelog_blog(){
        return view('admin.catelog_blog');
    }

    public function showtags(){
        return view('admin.tags');
    }

    public function showbanner(){
        return view('admin.banner');
    }

    public function showcoupon(){
        return view('admin.coupon');
    }

    public function showlanguage(){
        return view('admin.language');
    }

    public function showorder(){
        return view('admin.order');
    }

    public function showorderdetail(){
        return view('admin.orderdetail');
    }

    public function showcomment(){
        return view('admin.comment');
    }

    public function showuser(){
        return view('admin.user');
    }

    public function showAdminUser(){
        return view('admin.AdminUser');
    }

    public function showPassreset(){
        return view('admin.Passreset');
    }

}
