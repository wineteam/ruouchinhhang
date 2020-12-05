<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\LanguageSwitch;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class MngProductController extends Controller
{
    public function index()
    {
      $products = Product::orderBy('created_at','desc')->paginate(12);
      return view('admin.product.index')->with(["products"=>$products]);
    }
    public function orderPro($order)
    {
      if($order === "old"){
        $products = Product::paginate(12);
        $old = "selected";
        return view('admin.product.index',compact('products','old'));
      }
        $new = "selected";
        $products = Product::orderBy('created_at','desc')->paginate(12);
        return view('admin.product.index',compact('products','new'));
    }
    public function search(Request $request){
      $products = Product::
      where('name','like','%'.$request->name.'%')
      ->paginate(12);
      return view('admin.product.index')->with(["products"=>$products]);
    }

    public function create()
    {
     
      $categories = Category::all();
      $languages = LanguageSwitch::all();
      $Tag = Tag::all();
      return view('admin.product.create')->with(['categories'=>$categories,'languages'=>$languages,'Tag'=>$Tag]);
    }

    public function store(Request $request)
    {
      $request->validate([
          'name' => 'required | string | max:255',
          'codePro' => 'required | string',
          'price' => 'required | integer',
          'size' => 'required | string | max:255',
          'vintage' => 'required | string | max:255',
          'detail' => 'max:255',
          'discount' => 'required | integer',
          'nation' => 'required | string | max:255',
          'amount' => 'required | integer',
      ],
      [
          'name.required' => 'Mảng :attribute yêu cầu bắt buộc.',

          'codePro.required' => 'Mảng :attribute yêu cầu bắt buộc.',

          'price.required' => 'Mảng :attribute yêu cầu bắt buộc.',
          'price.integer' => 'Mảng :attribute yêu câu số nguyên.',

          'size.required' => 'Mảng :attribute yêu cầu bắt buộc.',

          'vintage.required' => 'Mảng :attribute yêu cầu bắt buộc.',

          'detail.required' => 'Mảng :attribute yêu cầu bắt buộc.',

          'discount.required' => 'Mảng :attribute yêu cầu bắt buộc.',
          'discount.integer' => 'Mảng :attribute yêu câu số nguyên.',

          'nation.required' => 'Mảng :attribute yêu cầu bắt buộc.',

          'description.required' => 'Mảng :attribute yêu cầu bắt buộc.',

          'amount.required' => 'Mảng :attribute yêu cầu bắt buộc.',
          'amount.integer' => 'Mảng :attribute yêu câu số nguyên.',
      ]);
      $user_id = Auth()->user()->id;
      $product = new Product;
      $product->user_id = $user_id;
      $product->codeProduct = $request->codePro;
      $product->name = $request->name;
      $product->slug = str_slug($request->name);
      if( $request->hasFile('thumbnail')){
        $name = $product->id.$request->thumbnail->getClientOriginalName();
        $path = $request->thumbnail->storeAs('product_images',$name,'public');
        $product->thumbnail  = $path;
      }
      $product->price = $request->price;
      $product->size = $request->size;
      $product->vintage = $request->vintage;
      $product->detail = $request->detail;
      $product->discount = $request->discount;
      $product->nation = $request->nation;
      $product->description = $request->description;
      $product->language_id  = $request->language_id;
      $product->is_published  = $request->is_published;
      $product->especially  = $request->especially;
      $product->amount = $request->amount;
      $saved = $product->save();
      if(isset($request->categories) && $saved === true){
        $product->categories->sync($request->categories);
      }
      if(isset($request->tags) && $saved == true){
        $product->tags->sync($request->tags);
      }
      if($saved === false){ //ERRORS < HERE
        Storage::delete($name);
        
      };
      session()->flash('success', 'Thêm thành công');

      return redirect()->route('MngProduct.index');
    }

    public function edit(Product $id)
    {
      $categories = [];
      $CategoryChecked = $id->categories()->get();
      $Category = Category::all();
      foreach ($Category as $Categorys){
        $Categorys['checked'] = false;
        foreach ($CategoryChecked as $CategoryCheckeds){
          if ($Categorys['slug'] === $CategoryCheckeds->slug){
            $Categorys['checked'] = true;
          }
        }
          $categories[] = $Categorys;
      }
      $NTags = [];
      $TagsChecked = $id->tags()->get();
      $Tag = Tag::all();
      foreach ($Tag as $Tags){
        $Tags['checked'] = false;
        foreach ($TagsChecked as $TagChecked){
          if ($Tags['slug'] === $TagChecked->slug){
            $Tags['checked'] = true;
          }
        }
          $NTags[] = $Tags;
      }
      return view('admin.product.edit')->with(['product'=>$id,'categories'=>$categories,'NTags'=>$NTags]);
    }

    public function update(Request $request,$id)
    {
      $product = Product::find($id);
      $user_id = Auth()->user()->id;
      $slug = str_slug($request->name);
      if(isset($request->user_id)){
        $product->user_id = $request->user_id;
      }
      if(isset($request->slug)){
        $product->slug = $request->slug;
      }
      if(isset($request->name)){
        $product->name = $request->name;
      }
      if(isset($request->codeProduct)){
        $product->codeProduct = $request->codeProduct;
      }
      if(isset($request->size)){
        $product->size = $request->size;
      }
      if(isset($request->vintage)){
        $product->vintage = $request->vintage;
      }
      if(isset($request->detail)){
        $product->detail = $request->detail;
      }
      if( $request->hasFile('thumbnail')){
        $name = $product->id.$request->thumbnail->getClientOriginalName();
        $path = $request->thumbnail->storeAs('product_images',$name,'public');
        $product->thumbnail  = $path;
      }
      if(isset($request->price)){
        $product->price = $request->price;
      }
      if(isset($request->discount)){
        $product->discount = $request->discount;
      }
      if(isset($request->nation)){
        $product->nation = $request->nation;
      }
      if(isset($request->amount)){
        $product->amount = $request->amount;
      }
      if(isset($request->roles)){
        $product->roles = $request->roles;
      }
      if(isset($request->is_published)){
        $product->is_published = $request->is_published;
      }
      if(isset($request->especially)){
        $product->especially = $request->especially;
      }
      if(isset($request->language)){
        $product->language = $request->language;
      }
      $saved = $product->save();
      
      if(isset($request->categories) && $saved == true){
        $product->categories()->sync($request->categories);
      }
      if(isset($request->tags) && $saved == true){
        $product->tags()->sync($request->tags);
      }
      if($saved === false){ //ERRORS < HERE
        Storage::delete($name);
        
      };
      session()->flash('message','success');
      return redirect('/dashboard/product');
    }

    public function destroy(Product $id)
    {
      $id->delete();
      session()->flash('message', 'Xóa Người dùng thành công');
      return redirect()->back();
    }

    public function deleteAll(Request $request) {
      $productId = explode(',',$request->productId[0]);
      $deleted = Product::whereIn('id',$productId)->delete();
      if($deleted) {
        return redirect()->back()->with('message', 'Da xoa thanh cong');
      }
      return redirect()->back()->with('message', 'Xoa khong thanh cong');
    }


}
