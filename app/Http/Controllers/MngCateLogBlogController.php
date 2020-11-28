<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MngCateLogBlogController extends Controller
{
    public function index(){
        return view('admin.catelog_blog');
    }
}
