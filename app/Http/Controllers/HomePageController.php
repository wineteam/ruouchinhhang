<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index(){
        $products = Product::where('is_published','1')->where('especially','1')
            ->inRandomOrder()->take(8)->get();
        return view('client.homepage')->with('products',$products);
    }
}
