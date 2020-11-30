<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MngOrderDetailController extends Controller
{
    public function index(){
        return view('admin.orderdetail');
    }
}
