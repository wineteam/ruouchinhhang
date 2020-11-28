<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MngCouponController extends Controller
{
    public function index(){
        return view('admin.coupon');
    }
}
