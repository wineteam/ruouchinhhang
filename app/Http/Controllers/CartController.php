<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class CartController extends Controller
{
  public function index()
  {
    return view('client.cartDetails');
  }
  public function store(Request $request){
    if(!session()->has('cart')){
      session()->put('cart',[]);
      return 'setting';
    }
    return "oke";

  }
}
