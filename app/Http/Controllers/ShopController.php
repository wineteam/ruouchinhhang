<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;

class ShopController extends Controller
{

    public function index(){
      $products =  Product::join('language_switches', function ($join) {
        $join->on('language_id', '=', 'language_switches.id')
          ->where('language_switches.slug', '=', App()->getLocale());
      })->select('products.*')->where('is_published','1')->orderBy('created_at','desc')->paginate(6);
      session()->forget('message');
      return view('client.shop')->with(['products'=>$products]);
    }

    public function show(Product $product){
      $idRelation = [];
      $arrProRel = $product->productRelation()->get();
      foreach ($arrProRel as $id){
        $idRelation[] = $id->product_relation_id;
      }
      $productRelations = Product::whereIn('id',$idRelation)->limit('3')->get();
      return view('client.productdetail')
        ->with(['product'=>$product,'productRelations'=>$productRelations]);
    }
    public function getProByCat(Category $slug){
      $products = $slug->products()->join('language_switches', function ($join) {
        $join->on('language_id', '=', 'language_switches.id')
          ->where('language_switches.slug', '=', App()->getLocale());
      })->select('products.*')->where('is_published','1')->orderBy('created_at','desc')->paginate(8);
      session()->flash('message',$slug->name);
      return view('client.shop')
        ->with(['products'=>$products]);
    }

  public function getProByNat($slug)
  {
    $products = Product::join('language_switches', function ($join) {
    $join->on('language_id', '=', 'language_switches.id')
      ->where('language_switches.slug', '=', App()->getLocale());
  })->select('products.*')->where('is_published','1')->where('nation',$slug)->orderBy('created_at','desc')->paginate(8);
    session()->flash('message',__('nation').": ".$slug);
    return view('client.shop')
      ->with(['products'=>$products]);
  }
    public function searchWithTag(Tag $tag){
      $products = Product::join('tags','products.id','=','tags.product_id')
        ->where('tags.slug','=',$tag->slug)
        ->where('is_published','1')
        ->select('products.*')
        ->paginate(6);
      session()->flash('message','Tag : '.$tag->name);
      return view('client.shop')->with(['products'=>$products]);
    }
}
