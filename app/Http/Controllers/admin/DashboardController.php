<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;

class DashboardController extends Controller
{
    public function index(){
        $products =  Product::all();$users = User::all();$blogs = Blog::all();$categories = Category::all();
        $productsCount = $products->count();$usersCount = $users->count();$blogsCount = $blogs->count();$categoriesCount = $categories->count();

        $blogViews = Blog::select('blogs.*')->where('is_published', '1')->orderBy('view', 'desc')->get();

        return view('admin.dashboard.index')->with
        ([
            "products"=>$products,"users"=>$users,"blogs"=>$blogs,"categories"=>$categories,"blogViews"=>$blogViews,
            'productsCount'=>$productsCount,"usersCount"=>$usersCount,"blogsCount"=>$blogsCount,"categoriesCount"=>$categoriesCount
        ]);
    }
}
