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
            <form action="">
                <div class="col-xl-12 col-md-12 col-sm-12 no-pdd-buyed">
                    <h4 class="mb-3">{{__('checkout.payment')}}</h4>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="firstName">{{__('checkout.methods')}}</label>
                            <select class="form-control" name="payment_method" id="payment_method" onchange="get_bank()">
                              <option value="ATM_ONLINE">Thanh toán bằng thẻ ATM</option>
                              <option value="IB_ONLINE">Thanh toán bằng tài khoản ngân hàng/Internet Banking</option>
                              <option value="QRCODE">Thanh toán bằng QRCODE</option>
                              <option value="CASH_IN_SHOP">Thanh toán tiền mặt tại quầy</option>
                            </select>
                        </div>
                        <div class="col-md-12 mb-3">
                          <label for="firstName">{{__('checkout.bank')}}</label>
                          <select class="form-control" name="bank_code" id="bank_code">
                          </select>
                      </div>

                    </div>
                    <h4 class="mb-3">{{__('checkout.Bill')}}</h4>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="firstName">{{__('checkout.name')}}</label>
                            <input type="text" class="form-control Fix-input-checkout Fix-high-checkout" 
                            name="buyer_fullname" id="buyer_fullname" placeholder="{{__('checkout.name')}}" value=" @if (Auth::check()) {{Auth::user()->name}} @endif " required>
                            <div class="invalid-feedback">
                                Valid first name is required.
                            </div>
                        </div>

                    </div>
                    <div class="mb-3">
                        <label for="Phone">{{__('checkout.address')}}</label>
                            <input type="text" class="form-control Fix-input-checkout Fix-high-checkout" 
                            name="buyer_address" id="buyer_address" placeholder="{{__('checkout.address')}}" value="@if (Auth::check()) {{Auth::user()->address}} @endif" required>
                        <div class="invalid-feedback">
                            Valid Phone is required.
                        </div>
                    </div>
                    <div class="mb-3">
                      <label for="Phone">{{__('checkout.phone')}}</label>
                          <input type="number" class="form-control Fix-input-checkout Fix-high-checkout" 
                          name="buyer_mobile" id="buyer_mobile" placeholder="{{__('checkout.phone')}}" value="@if (Auth::check()) {{Auth::user()->phone}} @endif" required>
                      <div class="invalid-feedback">
                          Valid Phone is required.
                      </div>
                    </div>
                    <div class="mb-3">
                        <label for="Emailaddress">{{__('checkout.email')}}</label>
                            <input type="email" class="form-control Fix-input-checkout Fix-high-checkout" 
                            name="buyer_email" id="buyer_email" placeholder="{{__('checkout.email')}}" value="" required>
                        <div class="invalid-feedback">
                            Valid Email address is required.
                        </div>
                    </div>
                </div>
            </form>
    <!--====================================== END Box-Checking-ERROR ======================================-->
    <hr class="mb-4">
        <p class="Edit-privacy-policy">Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our <a href=""><span>privacy policy</span></a>.</p>
                <button class="btn btn-red-checkout float-right" type="submit"><span>Place order</span></button>
              </form>
        </div>
    </div>
    </div>
    <script src="content/js/validation.js"></script>
    <!--====================================== END Buyed ======================================-->
    <!--====================================== Empty Space ======================================-->
    <div style="height: 5.5em"><span></span></div>
    <!--====================================== END Empty Space ======================================-->
<!--BG-WHITE-->
</div>
<!--BG-WHITE-->
<script src="https://www.nganluong.vn/webskins/javascripts/jquery_min.js" type="text/javascript"></script>		
<script language="javascript">
    $('input[name="option_payment"]').bind('click', function () {
        $('.list-content li').removeClass('active');
        $(this).parent().parent('li').addClass('active');
    });		
</script> 
@endsection
