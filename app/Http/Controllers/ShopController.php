<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;

class ShopController extends Controller
{

    public function index(){
      $products =  Product::join('language_switches', function ($join) {
        $join->on('language_id', '=', 'language_switches.id')
          ->where('language_switches.slug', '=', App()->getLocale());
      })->select('products.*')->where('is_published','1')->orderBy('created_at','desc')->paginate(6);

      $proOrderBought = Product::join('language_switches', function ($join) {
        $join->on('language_id', '=', 'language_switches.id')
          ->where('language_switches.slug', '=', App()->getLocale());
      })->select('products.*')->where('is_published','1')->orderBy('bought','desc')->take(4)->get();

      $categories =  Category::join('language_switches', function ($join) {
        $join->on('language_id', '=', 'language_switches.id')
          ->where('language_switches.slug', '=', App()->getLocale());
      })->select('categories.*')->where('is_published','1')->where('type','0')->get();
      return view('client.shop')->with(['products'=>$products,'categories'=>$categories,'proOrderBought'=>$proOrderBought]);
    }

    public function ShowDetailPro(Product $product){
      $tagprimary = Tag::where('primary','1')->limit('8')->get();
      $productRelated = [];
        if($product !=null){
          $category = $product->categories()->where('is_published','1')->first();
          if($category != null){
              $productRelated = $category->products()->where('slug','!=',$product->slug)->inRandomOrder()->take(3)->get();
          }
        }
      $proOrderBought = Product::join('language_switches', function ($join) {
        $join->on('language_id', '=', 'language_switches.id')
          ->where('language_switches.slug', '=', App()->getLocale());
      })->select('products.*')->where('is_published','1')->orderBy('bought','desc')->take(4)->get();

      $categories =  Category::join('language_switches', function ($join) {
        $join->on('language_id', '=', 'language_switches.id')
          ->where('language_switches.slug', '=', App()->getLocale());
      })->select('categories.*')->where('is_published','1')->where('type','0')->get();

      return view('client.productdetail')->with(['product'=>$product,'categories'=>$categories,'productRelated'=>$productRelated,'proOrderBought'=>$proOrderBought,'tagPrimary'=>$tagprimary]);
    }
    public function getProByCat(Category $slug){
      $nameCate = $slug->name;
      $proOrderBought = Product::join('language_switches', function ($join) {
        $join->on('language_id', '=', 'language_switches.id')
          ->where('language_switches.slug', '=', App()->getLocale());
      })->select('products.*')->where('is_published','1')->orderBy('bought','desc')->take(4)->get();
      $products = $slug->products()->where('is_published','1')->orderBy('created_at','desc')->paginate(8);
      $categories =  Category::join('language_switches', function ($join) {
        $join->on('language_id', '=', 'language_switches.id')
          ->where('language_switches.slug', '=', App()->getLocale());
      })->select('categories.*')->where('is_published','1')->where('type','0')->get();
//      dd($products);
      return view('client.shop')->with(['products'=>$products,'categories'=>$categories,'nameCat'=>$nameCate,'proOrderBought'=>$proOrderBought]);
    }
}
