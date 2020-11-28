<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MngCateLogController extends Controller
{
    public function index(){
        return view('admin.catelog');
    }
}
