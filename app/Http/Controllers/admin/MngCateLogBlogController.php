<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

class MngCateLogBlogController extends Controller
{
    public function index(){
        return view('admin.category.blog.index');
    }
}
