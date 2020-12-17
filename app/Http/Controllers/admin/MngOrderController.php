<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MngOrderController extends Controller
{
    public function index(){
        $newDateTime = Carbon::now()->addDays(5);
        $orderNumber = 1;
        $orders = Order::orderBy('created_at','desc')->paginate(12);
        return view('admin.order.index')->with(["orders"=>$orders,"orderNumber"=>$orderNumber,"newDateTime"=>$newDateTime]);
    }
    public function orderPro($order)
    {
      if($order === "old"){
        $orderNumber = 1;
        $orders = Order::paginate(12);
        $old = "selected";
        return view('admin.order.index',compact('orders','old','orderNumber'));
      }
        $orderNumber = 1;
        $new = "selected";
        $orders = Order::orderBy('created_at','desc')->paginate(12);
        return view('admin.order.index',compact('orders','new','orderNumber'));
    }
    public function search(Request $request){
        $orderNumber = 1;
        $orders = Order::where('user_name','like','%'.$request->user_name.'%')->paginate(12);
        return view('admin.order.index')->with(["orders"=>$orders,"orderNumber"=>$orderNumber]);
    }
}
