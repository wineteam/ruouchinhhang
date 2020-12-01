<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
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
      return view('admin.product.create');
    }

    public function store(Request $request)
    {
      $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'slug' => ['required', 'string', 'max:255', 'confirmed'],
        'thumbnail' => ['required', 'string', 'max:255'],
        'price' => ['required', 'string', 'max:255'],
        'size' => ['required', 'string', 'max:255'],
        'vintage' => ['required', 'string', 'max:255'],
        'detail' => ['required', 'string', 'max:255'],
        'discount' => ['required', 'string', 'max:255'],
        'nation' => ['required', 'string', 'max:255'],
        'description' => ['required', 'string', 'max:255'],
        'language_id' => ['required', 'string', 'max:255'],
        'id_puclished' => ['required', 'string', 'max:255'],
      ]);
      $data=array(
          'name'=>$request->name,
          'slug'=>$request->slug,
          'thumbnail'=>$request->thumbnail,
          'price'=>$request->price,
          'size'=>$request->size,
          'vintage'=>$request->vintage,
          'detail'=>$request->detail,
          'discount'=>$request->discount,
          'nation'=>$request->nation,
          'description'=>$request->description,
          'language_id'=>$request->language_id,
          'id_puclished'=>$request->id_puclished,
      );
      Product::create($data);
      session()->flash('success', 'Thêm tài khoản thành công');

      return redirect('/dashboard/user');
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
