<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MngBannerController extends Controller
{
    public function index(){
        return view('admin.banner');
    }
}

