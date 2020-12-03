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
            <form class="needs-validation" novalidate>

                <div class="col-xl-12 col-md-12 col-sm-12 no-pdd-buyed">
                    <h4 class="mb-3">Billing details</h4>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="firstName">Your name</label>
                            <input type="text" class="form-control Fix-input-checkout Fix-high-checkout" id="firstName" placeholder="" value="" required>
                            <div class="invalid-feedback">
                                Valid first name is required.
                            </div>
                        </div>

                    </div>
                    <div class="mb-3">
                        <label for="Streetaddress">Street address</label>
                            <input type="text" class="form-control Fix-input-checkout" id="Streetaddress" placeholder="" value="" required>
                        <div class="invalid-feedback">
                            Valid Street address is required.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="Phone">Phone</label>
                            <input type="text" class="form-control Fix-input-checkout Fix-high-checkout" id="Phone" placeholder="" value="" required>
                        <div class="invalid-feedback">
                            Valid Phone is required.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="Emailaddress">Email address</label>
                            <input type="text" class="form-control Fix-input-checkout Fix-high-checkout" id="Emailaddress" placeholder="" value="" required>
                        <div class="invalid-feedback">
                            Valid Email address is required.
                        </div>
                    </div>
                </div>

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
                            <td colspan="2" class="text-uppercase"><span class="font-weight-bold">{{$discount}} vnđ</span></td>
                          </tr>
                        @endif
                          <tr>
                            <td colspan="1" class="text-uppercase text-right font-weight-bold">SUBTOTAL</td>
                            <td colspan="2" class="text-uppercase">{{$subtotal}} vnđ</td>
                          </tr>

                        <tr>
                          <td colspan="1" class="text-uppercase text-right font-weight-bold">TAX</td>
                          <td colspan="2" class="text-uppercase"><span class="font-weight-bold">{{$tax}} vnđ</span></td>
                        </tr>
                          <tr>
                            <td colspan="1" class="text-uppercase text-right font-weight-bold">TOTAL</td>
                            <td colspan="2" class="text-uppercase"><span class="font-weight-bold">{{$total}} vnđ</span></td>
                          </tr>
                        </tbody>
                    </table>

    <hr class="mb-4">
    <!--====================================== Box-Checking-ERROR ======================================-->
    <div class="container">
        <div class="row">
            <hr>
            <div class="col-12 bg-Box border-top-Box box-title">
                <p><i class="fa fa-window-maximize" aria-hidden="true"></i> Sorry, it seems that there are no available payment methods for your state. Please contact us if you require assistance or wish to make alternate arrangements.</p>
            </div>
            <hr>
        </div>
    </div>
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

@endsection
