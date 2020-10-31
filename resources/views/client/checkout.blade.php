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

            <div class="checkout-bg">
                <h1 class="text-center Font-white">Checkout</h1>
                <p class="text-center Font-white"><a href="{{ route('home',App()->getLocale()) }}"><span>Home</span></a> / <a href="{{ route('shop',App()->getLocale()) }}"><span>shop</span></a> / <a href=""><span>checkout</span></a></p>
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
            <div class="col-12 bg-Box border-top-Box box-title">
                <p><i class="fa fa-window-maximize" aria-hidden="true"></i> Returning customer? <a href=""><span>Click here to login</span></a></p>
            </div>

            <div class="col-12 bg-Box border-top-Box box-title">
                <p><i class="fa fa-window-maximize" aria-hidden="true"></i> Have a coupon? <a href=""><span>Click here to enter your code</span></a></p>
            </div>
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
                            <label for="firstName">First name</label>
                            <input type="text" class="form-control Fix-input-checkout Fix-high-checkout" id="firstName" placeholder="" value="" required>
                            <div class="invalid-feedback">
                            Valid first name is required.
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lastName">Last name</label>
                            <input type="text" class="form-control Fix-input-checkout Fix-high-checkout" id="lastName" placeholder="" value="" required>
                            <div class="invalid-feedback">
                            Valid last name is required.
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="Companyname">Company name <span class="text-muted">(Optional)</span></label>
                        <input type="text" class="form-control Fix-input-checkout Fix-high-checkout" id="Companyname" placeholder="">
                    </div>

                    <div class="mb-3">
                        <label for="country">Country</label>
                        <select class="custom-select d-block w-100" id="country" required>
                        <option>Vietnam</option>
                        </select>
                        <div class="invalid-feedback Fix-input-checkout Fix-high-checkout">
                        Please select a valid country.
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
                    <label for="Postcode">Postcode / ZIP <span class="text-muted">(Optional)</span></label>
                    <input type="text" class="form-control Fix-input-checkout Fix-high-checkout" id="Postcode" placeholder="">
                    </div>

                    <div class="mb-3">
                        <label for="TownCity">Town / City</label>
                            <input type="text" class="form-control Fix-input-checkout Fix-high-checkout" id="TownCity" placeholder="" value="" required>
                        <div class="invalid-feedback">
                            Valid Town / City is required.
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

                    <h4 class="mb-3">Billing details</h4>
                    <div class="mb-3">
                        <label for="Companyname">Company name <span class="text-muted">(Optional)</span></label>
                        <textarea class="form-control Fix-input-checkout" id="exampleFormControlTextarea1" rows="3"></textarea>
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
                          <tr>
                            <td colspan="1">Lambert Sweet White - 500ml, 2014  × <span class="font-weight-bold">1</span></td>
                            <td colspan="2">£150.00</td>
                          </tr>
                          <tr>
                            <td colspan="1" class="text-uppercase text-right font-weight-bold">SUBTOTAL</td>
                            <td colspan="2" class="text-uppercase">£150.00</td>
                          </tr>
                          <tr>
                            <td colspan="1" class="text-uppercase text-right font-weight-bold">TOTAL</td>
                            <td colspan="2" class="text-uppercase"><span class="font-weight-bold">£150.00</span></td>
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
