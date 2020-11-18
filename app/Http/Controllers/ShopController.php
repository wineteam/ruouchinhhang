<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\LanguageSwitch;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{

    public function index(){
      $tagPrimary = Tag::where('primary','1')->limit('8')->get();
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
      session()->forget('message');
      return view('client.shop')->with(['products'=>$products,'categories'=>$categories,'proOrderBought'=>$proOrderBought,'tagPrimary'=>$tagPrimary]);
    }

    public function show(Product $product){
      $idRelation = [];
      $arrProRel = $product->productRelation()->get();
      foreach ($arrProRel as $id){
        $idRelation[] = $id->product_relation_id;
      }
      $productRelations = Product::whereIn('id',$idRelation)->limit('3')->get();
      $tag_primary = Tag::where('primary','1')->limit('8')->get();
      $proOrderBought = Product::join('language_switches', function ($join) {
        $join->on('language_id', '=', 'language_switches.id')
          ->where('language_switches.slug', '=', App()->getLocale());
      })->select('products.*')->where('is_published','1')->orderBy('bought','desc')->take(4)->get();
      $categories =  Category::join('language_switches', function ($join) {
        $join->on('language_id', '=', 'language_switches.id')
          ->where('language_switches.slug', '=', App()->getLocale());
      })->select('categories.*')->where('is_published','1')->where('type','0')->get();

      return view('client.productdetail')
        ->with(['product'=>$product,'categories'=>$categories,'proOrderBought'=>$proOrderBought,'tagPrimary'=>$tag_primary,'productRelations'=>$productRelations]);
    }
    public function getProByCat(Category $slug){
      $tag_primary = DB::table('tags')->where('primary','1')->limit('8')->get();
      $proOrderBought = Product::join('language_switches', function ($join) {
        $join->on('language_id', '=', 'language_switches.id')
          ->where('language_switches.slug', '=', App()->getLocale());
      })->select('products.*')->where('is_published','1')->orderBy('bought','desc')->take(4)->get();
      $products = $slug->products()->where('is_published','1')->orderBy('created_at','desc')->paginate(8);
      $categories =  Category::join('language_switches', function ($join) {
        $join->on('language_id', '=', 'language_switches.id')
          ->where('language_switches.slug', '=', App()->getLocale());
      })->select('categories.*')->where('is_published','1')->where('type','0')->get();
      session()->flash('message',$slug->name);
      return view('client.shop')
        ->with(['products'=>$products,'categories'=>$categories,'proOrderBought'=>$proOrderBought,'tagPrimary'=>$tag_primary]);
    }

    public function searchWithTag(Tag $tag){

      $products = Product::join('tags','products.id','=','tags.product_id')
        ->where('tags.slug','=',$tag->slug)
        ->where('is_published','1')
        ->select('products.*')
        ->paginate(6);
      $tagPrimary = Tag::where('primary','1')->limit('8')->get();
      $proOrderBought = Product::join('language_switches', function ($join) {
        $join->on('language_id', '=', 'language_switches.id')
          ->where('language_switches.slug', '=', App()->getLocale());
      })->select('products.*')->where('is_published','1')->orderBy('bought','desc')->take(4)->get();

      $categories =  Category::join('language_switches', function ($join) {
        $join->on('language_id', '=', 'language_switches.id')
          ->where('language_switches.slug', '=', App()->getLocale());
      })->select('categories.*')->where('is_published','1')->where('type','0')->get();
      session()->flash('message','Tag : '.$tag->name);
      return view('client.shop')->with(['products'=>$products,'categories'=>$categories,'proOrderBought'=>$proOrderBought,'tagPrimary'=>$tagPrimary]);
    }
}
