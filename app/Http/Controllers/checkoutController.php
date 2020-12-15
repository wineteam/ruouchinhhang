<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Models\NL_Checkout;
class checkoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {

      $subtotal = $this->parseMoney(Cart::subtotal());
      $discount = session()->get('coupon')['discount'] ?? 0;
      $total = ($subtotal + $this ->parseMoney(Cart::tax())) - $discount;
      if($total < 0){
        $total = 0;
      }
      return view('client.checkout')->with([
        'discount'=>$discount,
        'total'=>$total,
      ]);
    }
     public function parseMoney($money)
     {
       return (float)preg_replace('/[^\d.]/', '', $money);
     }
    





    
     public function create(Request $request)
     {
         session(['cost_id' => $request->id]);
         session(['url_prev' => url()->previous()]);
         $vnp_TmnCode = "A7ZSUS6G"; //Mã website tại VNPAY 
         $vnp_HashSecret = "O9YI22PK3GNOJE1KKP6OEXW4B1UOKPZM"; //Chuỗi bí mật
         $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
         $vnp_Returnurl = route('checkout.return');
         $vnp_TxnRef = date("YmdHis"); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
         $vnp_OrderInfo = "Thanh toán hóa đơn phí dich vụ";
         $vnp_OrderType = 'billpayment';
         $vnp_Amount = $request->input('amount');
         $vnp_Locale = 'vn';
         $vnp_IpAddr = request()->ip();
 
         $inputData = array(
             "vnp_Version" => "2.0.0",
             "vnp_TmnCode" => $vnp_TmnCode,
             "vnp_Amount" => $vnp_Amount,
             "vnp_Command" => "pay",
             "vnp_CreateDate" => date('YmdHis'),
             "vnp_CurrCode" => "VND",
             "vnp_IpAddr" => $vnp_IpAddr,
             "vnp_Locale" => $vnp_Locale,
             "vnp_OrderInfo" => $vnp_OrderInfo,
             "vnp_OrderType" => $vnp_OrderType,
             "vnp_ReturnUrl" => $vnp_Returnurl,
             "vnp_TxnRef" => $vnp_TxnRef,
         );
 
         if (isset($vnp_BankCode) && $vnp_BankCode != "") {
             $inputData['vnp_BankCode'] = $vnp_BankCode;
         }
         ksort($inputData);
         $query = "";
         $i = 0;
         $hashdata = "";
         foreach ($inputData as $key => $value) {
             if ($i == 1) {
                 $hashdata .= '&' . $key . "=" . $value;
             } else {
                 $hashdata .= $key . "=" . $value;
                 $i = 1;
             }
             $query .= urlencode($key) . "=" . urlencode($value) . '&';
         }
 
         $vnp_Url = $vnp_Url . "?" . $query;
         if (isset($vnp_HashSecret)) {
            // $vnpSecureHash = md5($vnp_HashSecret . $hashdata);
             $vnpSecureHash = hash('sha256', $vnp_HashSecret . $hashdata);
             $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
         }
         return redirect($vnp_Url);
     }


     public function return(Request $request)
     {
         $url = session('url_prev','/checkout/return');
         if($request->vnp_ResponseCode == "00") {
             $this->apSer->thanhtoanonline(session('cost_id'));
             return redirect($url)->with('success' ,'Đã thanh toán phí dịch vụ');
         }
         session()->forget('url_prev');
         return redirect($url)->with('errors' ,'Lỗi trong quá trình thanh toán phí dịch vụ');
     }
    
}
