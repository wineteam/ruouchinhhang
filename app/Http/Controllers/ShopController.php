<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(){
      return view('client.shop');
    }
    public function ShowDetailPro(){
      return view('client.productdetail');
    }
}
