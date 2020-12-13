@extends('layouts.app')
@section('content')

<!--BG-WHITE-->
<div class="bg-white">
<!--BG-WHITE-->
    <!--====================================== Title Checkout ======================================-->
    <div class="container-fluid Title_bg">
        <div>
            <div class="Display-noneX" style="height: 5.5em"><span></span></div>
            <div style="height: 5em"><span></span></div>

            <div class="checkout-bg text-center">
                <h1 class="Font-white">Checkout</h1>
                <ul class="breadcrumb-List">
                    <li><a href="{{ route('home',App()->getLocale()) }}"><span>Home</span></a></li>
                    <li><span class="none-color">Checkout</span></li>
                </ul>
            </div>

            <div style="height: 5em"><span></span></div>
            <div class="Display-noneX" style="height: 5.8em"><span></span></div>
        </div>
    </div><!-- /.sc_content -->
    <!--====================================== END Title Checkout ======================================-->
    <!--====================================== Empty Space ======================================-->
    <div style="height: 7.5em"><span></span></div>
    <!--====================================== END Empty Space ======================================-->
    <!--====================================== Box-Checking ======================================-->
    <div class="container">
        <div class="row">
          @if(Route::has('login'))
            @guest
            <div class="col-12 bg-Box border-top-Box box-title">
                <p><i class="fa fa-window-maximize" aria-hidden="true"></i> Returning customer? <a href="{{route('login')}}"><span>Click here to login</span></a></p>
            </div>
            @endguest
          @endif
          @if(!session()->has('coupon'))
            <div class="col-12 bg-Box border-top-Box box-title">
                <p><i class="fa fa-window-maximize" aria-hidden="true"></i> Have a coupon? <a href="{{route('cart.index')}}"><span>Click here to enter your code</span></a></p>
            </div>
          @endif
        </div>
    </div>
    <!--====================================== END Box-Checking ======================================-->
    <!--====================================== Buyed ======================================-->
<div class="container">
    <div class="row">
        <div class="col-xl-12 col-md-12 col-sm-12 no-pdd-buyed">
            <form action="{{ route('checkout.create') }}" id="create_form" method="POST">
            @csrf
                <div class="col-xl-12 col-md-12 col-sm-12 no-pdd-buyed">
                    <h4 class="mb-3">{{__('checkout.Bill')}}</h4>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="firstName">{{__('checkout.name')}}</label>
                            <input type="text" class="form-control Fix-input-checkout Fix-high-checkout" 
                            name="buyer_fullname" id="buyer_fullname" placeholder="{{__('checkout.name')}}" value=" @if (Auth::check()) {{Auth::user()->name}} @endif " required>
                        </div>

                    </div>
                    <div class="mb-3">
                        <label for="Phone">{{__('checkout.address')}}</label>
                            <input type="text" class="form-control Fix-input-checkout Fix-high-checkout" 
                            name="buyer_address" id="buyer_address" placeholder="{{__('checkout.address')}}" value="@if (Auth::check()) {{Auth::user()->address}} @endif" required>
                    </div>
                    <div class="mb-3">
                      <label for="Phone">{{__('checkout.phone')}}</label>
                          <input type="number" class="form-control Fix-input-checkout Fix-high-checkout" 
                          name="buyer_mobile" id="buyer_mobile" placeholder="{{__('checkout.phone')}}" value="@if (Auth::check()) {{Auth::user()->phone}} @endif" required>
                    </div>
                    <div class="mb-3">
                        <label for="Emailaddress">{{__('checkout.email')}}</label>
                            <input type="email" class="form-control Fix-input-checkout Fix-high-checkout" 
                            name="buyer_email" id="buyer_email" placeholder="{{__('checkout.email')}}" value="@if (Auth::check()) {{Auth::user()->email}} @endif" required>
                    </div>
                </div>

                <div class="col-xl-12 col-md-12 col-sm-12 no-pdd-buyed">
                    <h4 class="mb-3">{{__('VNPay')}}</h4>
                    <div class="form-group">
                        <label for="language">Loại hàng hóa </label>
                        <select name="order_type" id="order_type" class="form-control">
                            <option value="topup">Nạp tiền điện thoại</option>
                            <option value="billpayment">Thanh toán hóa đơn</option>
                            <option value="fashion">Thời trang</option>
                            <option value="other">Khác - Xem thêm tại VNPAY</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="order_id">Mã hóa đơn</label>
                        <input class="form-control" id="order_id" name="order_id" type="text" value="<?php echo date("YmdHis") ?>"/>
                    </div>
                    <div class="form-group">
                        <label for="amount">Số tiền</label>
                        <input class="form-control" id="amount"
                               name="amount" type="number" value="{{$total}}"/>
                    </div>
                    <div class="form-group">
                        <label for="order_desc">Nội dung thanh toán</label>
                        <textarea class="form-control" cols="20" id="order_desc" name="order_desc" rows="2">Noi dung thanh toan</textarea>
                    </div>
                    <div class="form-group">
                        <label for="bank_code">Ngân hàng</label>
                        <select name="bank_code" id="bank_code" class="form-control">
                            <option value="">Không chọn</option>
                            <option value="NCB"> Ngan hang NCB</option>
                            <option value="AGRIBANK"> Ngan hang Agribank</option>
                            <option value="SCB"> Ngan hang SCB</option>
                            <option value="SACOMBANK">Ngan hang SacomBank</option>
                            <option value="EXIMBANK"> Ngan hang EximBank</option>
                            <option value="MSBANK"> Ngan hang MSBANK</option>
                            <option value="NAMABANK"> Ngan hang NamABank</option>
                            <option value="VNMART"> Vi dien tu VnMart</option>
                            <option value="VIETINBANK">Ngan hang Vietinbank</option>
                            <option value="VIETCOMBANK"> Ngan hang VCB</option>
                            <option value="HDBANK">Ngan hang HDBank</option>
                            <option value="DONGABANK"> Ngan hang Dong A</option>
                            <option value="TPBANK"> Ngân hàng TPBank</option>
                            <option value="OJB"> Ngân hàng OceanBank</option>
                            <option value="BIDV"> Ngân hàng BIDV</option>
                            <option value="TECHCOMBANK"> Ngân hàng Techcombank</option>
                            <option value="VPBANK"> Ngan hang VPBank</option>
                            <option value="MBBANK"> Ngan hang MBBank</option>
                            <option value="ACB"> Ngan hang ACB</option>
                            <option value="OCB"> Ngan hang OCB</option>
                            <option value="IVB"> Ngan hang IVB</option>
                            <option value="VISA"> Thanh toan qua VISA/MASTER</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="language">Ngôn ngữ</label>
                        <select name="language" id="language" class="form-control">
                            <option value="vn">Tiếng Việt</option>
                            <option value="en">English</option>
                        </select>
                    </div>
                </div>
    
                <button class="btn btn-red-checkout float-right" type="submit"><span>Place order</span></button>
            </form>
        </div>
    </div>
<!--====================================== Buyed ======================================-->
<div class="container">
    <div class="row">
        <div class="col-xl-12 col-md-12 col-sm-12 no-pdd-buyed">
            <form class="needs-validation" novalidate>    
                <hr class="mb-4">
              <h4 class="mb-3">Your order</h4>
              <table class="table table-bordered">
                <thead>
                <tr>
                  <th scope="col" class="font-weight-bold">PRODUCT</th>
                  <th scope="col" class="font-weight-bold">TOTAL</th>
                </tr>
                </thead>
                <tbody>
                @foreach(Cart::content() as $item)
                  <tr>
                    <td colspan="1">{{$item->name}}  × <span class="font-weight-bold">{{$item->qty}}</span></td>
                    <td colspan="2">{{$item->price(0,",",".")}} vnđ</td>
                  </tr>
                @endforeach
                @if($discount > 0)
                  <tr>
                    <td colspan="1" class="text-uppercase text-right font-weight-bold">DISCOUNT</td>
                    <td colspan="2" class="text-uppercase"><span class="font-weight-bold">{{number_format($discount,0,',','.')}} vnđ</span></td>
                  </tr>
                @endif
                <tr>
                  <td colspan="1" class="text-uppercase text-right font-weight-bold">SUBTOTAL</td>
                  <td colspan="2" class="text-uppercase">{{Cart::subtotal(0,',','.')}} vnđ</td>
                </tr>

                <tr>
                  <td colspan="1" class="text-uppercase text-right font-weight-bold">TAX</td>
                  <td colspan="2" class="text-uppercase"><span class="font-weight-bold">{{Cart::tax(0,',','.')}} vnđ</span></td>
                </tr>
                <tr>
                  <td colspan="1" class="text-uppercase text-right font-weight-bold">TOTAL</td>
                  <td colspan="2" class="text-uppercase"><span class="font-weight-bold">{{number_format($total,0,',','.')}} vnđ</span></td>
                </tr>
                </tbody>
              </table>

    <hr class="mb-4">
<!--====================================== END Buyed ======================================-->
<!--====================================== Empty Space ======================================-->
<div style="height: 5.5em"><span></span></div>
<!--====================================== END Empty Space ======================================-->
<!--BG-WHITE-->
</div>
<!--BG-WHITE-->
<link href="https://sandbox.vnpayment.vn/paymentv2/lib/vnpay/vnpay.css" rel="stylesheet"/>
<script src="https://sandbox.vnpayment.vn/paymentv2/lib/vnpay/vnpay.js"></script>
<script type="text/javascript">
    $("#btnPopup").click(function () {
        var postData = $("#create_form").serialize();
        var submitUrl = $("#create_form").attr("action");
        $.ajax({
            type: "POST",
            url: submitUrl,
            data: postData,
            dataType: 'JSON',
            success: function (x) {
                if (x.code === '00') {
                    if (window.vnpay) {
                        vnpay.open({width: 768, height: 600, url: x.data});
                    } else {
                        location.href = x.data;
                    }
                    return false;
                } else {
                    alert(x.Message);
                }
            }
        });
        return false;
    });
</script>
@endsection
