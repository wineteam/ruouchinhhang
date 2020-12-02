<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\banner;
use Illuminate\Http\Request;

class MngBannerController extends Controller
{
    public function index(){
        $banner = banner::all();
        return view('admin.banner.index')->with(["banner"=>$banner]);
    }
    public function orderPro($order)
    {
      if($order === "old"){
        $banner = banner::paginate(12);
        $old = "selected";
        return view('admin.banner.index',compact('banner','old'));
      }
        $new = "selected";
        $banner = banner::orderBy('created_at','desc')->paginate(12);
        return view('admin.banner.index',compact('banner','new'));
    }
    public function search(Request $request){
      $banner = banner::where('name','like','%'.$request->name.'%')->paginate(12);
      return view('admin.banner.index')->with(["banner"=>$banner]);
    }
    public function create(banner $id)
    {
      return view('admin.add_user');
    }

    public function store(Request $request)
    {
      $request->validate([
        'thumbnail' => ['jpeg,png,bmp,tiff', 'max:2048'],
        'name' => ['required', 'string', 'max:255'],
        'description' => ['required', 'string', 'max:255'],
        'link' => ['required', 'string', 'max:255'],
        'order' => ['required', 'array', 'size:5'],
      ]);
      $data=array(
          'thumbnail'=>$request->thumbnail,
          'name'=>$request->name,
          'description'=>$request->description,
          'link'=>$request->link,
          'order'=>$request->order,
      );
      banner::create($data);
      session()->flash('success', 'Thêm Banner thành công');
      
      return redirect('/dashboard/banner');
    }

}

