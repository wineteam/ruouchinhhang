<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Product;
use App\Models\LanguageSwitch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomePageController extends Controller
{
    public function index(){

      $cateogries = Category::join('language_switches',function ($join){
        $join->on('language_id','=','language_switches.id')->where('language_switches.slug','=',App()->getLocale());
      })->select('categories.*')->where('type','0')->get();

      $products = Product::join('language_switches', function ($join) {
          $join->on('language_id', '=', 'language_switches.id')
              ->where('language_switches.slug', '=', App()->getLocale());
      })->select('products.*')->where('is_published','1')->where('especially','1')->inRandomOrder()->take(8)->get();

      $blogs_esp = Blog::join('language_switches', function ($join) {
        $join->on('language_id', '=', 'language_switches.id')
          ->where('language_switches.slug', '=', App()->getLocale());
      })->where('is_published','1')->where('especially','1')->inRandomOrder()->take(3)->orderBy('view','desc')->get();
      return view('client.homepage')->with(['products'=>$products,'blogs_esp'=>$blogs_esp,'categories'=>$cateogries]);
    }
}
