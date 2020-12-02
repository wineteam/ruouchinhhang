<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\LanguageSwitch;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        return view('admin.product',compact('products','old'));
      }
        $new = "selected";
        $products = Product::orderBy('created_at','desc')->paginate(12);
        return view('admin.product.index',compact('products','new'));
    }
    public function search(Request $request){
      $products = Product::where('name','like','%'.$request->name.'%')->paginate(12);
      return view('admin.product')->with(["products"=>$products]);
    }

    public function create()
    {
     
      $categories = Category::all();
      $languages = LanguageSwitch::all();
      return view('admin.product.create')->with(['categories'=>$categories,'languages'=>$languages]);
    }

    public function store(Request $request)
    {
      $this->validate($request,[
        'name' => 'required | string | max:255',
        'codePro' => 'required | string',
        'price' => 'required | integer',
        'size' => 'required | string | max:255',
        'vintage' => 'required | string | max:255',
        'detail' => 'max:255',
        'discount' => 'required | integer',
        'nation' => 'required | string | max:255',
        'amount' => 'required | integer',
        //'thumbnail' => 'mimes:jpeg,png,bmp,tiff | max:2048',
      ],
      $messages = [
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

        'thumbnail.mimes' => 'Hình ảnh không hợp lệ.',
      ]);

      $user_id = Auth()->user()->id;
      $product = new Product;
      $product->user_id = $user_id;
      $product->codeProduct = $request->codePro;
      $product->name = $request->name;
      $product->slug = str_slug($request->name);
      $product->thumbnail  = $request->thumbnail;
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
      if($saved === true && $request->hasFile('thumbnail')){
        $path = $product->id.$request->image->getClientOriginalName();
        $product->avatar = $path;
        $request->thumbnail->storeAs('product_images',$path,'public');
      };
      session()->flash('success', 'Thêm thành công');

      return redirect()->back()->with($messages);
    }

    public function edit(Product $id)
    {
      $newRoles = [];
      $rolesChecked = $id->roles()->get();
      $roles = Product::all();
      foreach ($roles as $role){
        $role['checked'] = false;
        foreach ($rolesChecked as $roleChecked){
          if ($role['slug'] === $roleChecked->slug){
            $role['checked'] = true;
          }
        }
          $newRoles[] = $role;
      }
      return view('admin.product.edit')->with(['user'=>$id,'roles'=>$newRoles]);
    }

    public function update(Request $request,$id)
    {

    }

    public function destroy(Product $id)
    {

    }


}
