<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class MngBlogController extends Controller
{
    public function index(){
        $blogs = Blog::all();
        $tags = Tag::select('tags.*')->where('primary', '1')->get();
        $categorys = Category::select('categories.*')->where('is_published','1')->where('type','1')->get();
        return view('admin.blog')->with(["blogs"=>$blogs,"tags"=>$tags,"categorys"=>$categorys]);
    }
}
