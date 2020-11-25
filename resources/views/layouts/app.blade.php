<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <base href="{{ asset('') }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Quanlity Wine') }}</title>
    <link rel="icon" href="{{ asset('images/icon-website.png') }}">
  <script type="application/x-javascript">
    addEventListener("load", function() {
      setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
      window.scrollTo(0, 1);
    }
  </script>
  <!-- fonts -->
  <link href="//fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900" rel="stylesheet">
  <link href="//fonts.googleapis.com/css?family=Monoton" rel="stylesheet">
<!--================================================================================================================================================================================================================================-->
    <!---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
    <!-- CSS JS Style -->
    <link rel="stylesheet" href="{{ asset('css/main.css')}}">
    <link rel="stylesheet" href="{{ asset('css/product.css')}}">
    <link rel="stylesheet" href="{{ asset('css/fontello.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/jquery-ui.js') }}" type="text/javascript"></script>
    <!---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('js/jquery-ui.css') }}">
    <!---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
    <!-- Font Awesome (Icon) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
    <!-- Bootstrap 4.5.2 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

<!--================================================================================================================================================================================================================================-->
</head>
<body>

<!--====================================== scrollTopOP ======================================-->
<button onclick="scrollTopOP()" id="myBtnScrollTop" title="Go to top" style="display: none;"><i class="fa fa-arrow-up" aria-hidden="true"></i></button>

<!--====================================== END scrollTopOP ======================================-->

<!--====================================== HEADER ======================================-->
    <header class="section-header padding-Header bg-white">
    <div class="container">
        <div class="row justify-content-center">
        <div class="col-xl-3 col-md-3 col-sm-12 Display-NoneCalls">
            <div class="card card-border-0 flex-row align-items-center h-100">
                    <a href="" class="text-dark edit-icon mr-auto-moblie-icon" style="padding: 10px 15px;border: 2px solid #bdb68e"><i class="fa fa-phone" aria-hidden="true"></i></a>
                <div class="card-block px-2">
                    <p class="card-text Re-font-ms"><span class="font-weight-bold Font-Blue">{{__('Call_us')}}: <a href="tel:123-456-7890" class="Font-Blue">123-456-7890</a></span> <br> <a class="Font-Blue" href="mailto:QuanlityWine@gmail.com">QuanlityWine@gmail.com</a></p>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-md-6 col-sm-12">
            <a href="{{route('home')}}"><img class="rounded mx-auto d-block" src="{{ asset('images/logo.png') }}" alt=""></a>
        </div>
        <div class="col-xl-3 col-md-3 col-sm-12 space_moblie2">
            <div class="card card-border-0 flex-row align-items-center h-100">
{{--                <div class="">--}}
                    <a href="{{route('cart.index')}}" class="text-dark edit-icon mr-auto-moblie-icon" style="padding: 10px 15px;border: 2px solid #bdb68e"> <i class="fa fa-shopping-bag" aria-hidden="true"></i></a>
{{--                </div>--}}
            <div class="mr-auto-moblie btn cart-open">
                <div class="card-block px-2">
                    <p class="card-text Re-font-ms text-cart-center"><span class="font-weight-bold Font-Blue">{{__('Your_cart')}}:</span> <br> <span class="Font-Yellow">0 items - £0.00</span></p>
                </div>
            </div>
            </div>

            <div class="Cart-list ml-auto">
                <!-- <p class="No-products">No products in the cart.</p> -->
                <div class="box-cart-overflow">

                    <div class="card card-border-0 flex-row align-items-center h-100" style="margin-top: 20px;margin-left: 10px;">
                        <div class="card-header bg-products-cart">
                            <img src="{{ asset('images/product-1.png') }}" alt="" width="40px">
                        </div>
                        <div class="card-block px-2">
                            <p class="card-text Re-font-ms" style="width: 100%;"><span style="font-size: 15px;"><a href="" class="Font-Blue">California Red Wine - 500ml, 2012</a></span></p>
                                <p class="Font-Red font-weight-bold">2 × £300.00</p>
                        </div>
                    </div>
                    <br><hr class="hr-cart-Products">

                    <div class="card card-border-0 flex-row align-items-center h-100" style="margin-top: 20px;margin-left: 10px;">
                        <div class="card-header bg-products-cart">
                            <img src="{{ asset('images/product-1.png') }}" alt="" width="40px">
                        </div>
                        <div class="card-block px-2">
                            <p class="card-text Re-font-ms" style="width: 100%;"><span style="font-size: 15px;"><a href="" class="Font-Blue">California Red Wine - 500ml, 2012</a></span>
                                <p class="Font-Red font-weight-bold">2 × £300.00</p>
                            </p>
                        </div>
                    </div>
                    <br><hr class="hr-cart-Products">
                </div>

                <p class="font-weight-bold" style="padding: 20px 0px 0 5%;">Subtotal: <span class="Font-Red"> £822.00</span></p>
                <div class="subtotal">
                    <a href="{{route('cart.index')}}" class="btn-subtitle-cart" style="margin-left: 5%;"><span class="">View cart</span></a>
                <a href="{{ route('checkout') }}" class="btn-subtitle-cart" style="margin-left: 2%;"><span class="">Checkout</span></a>
                </div>
            </div>

        </div>
        </div>
    </div>
    </header>
<!--====================================== END HEADER ======================================-->

<!--====================================== MENU ======================================-->
    <nav class="navbar navbar-expand-lg sticky-top bg-white">
        <div class="container">
            <button class="navbar-toggler mx-auto" type="button" id="btnMenuDropdown">
                <i class="fa fa-bars Font-Yellow" aria-hidden="true"></i>
            </button>
            <div class="collapse navbar-collapse navbar-collapse-custome">
                <ul class="nav navbar-nav navbar-logo mx-auto Blue-Link position-Re">
                    <li class="nav-item"> <a class="nav-link text-uppercase padding-text Font-Size-1vw" href="{{ route('home') }}">{{__('HOME')}}</a> </li>
                    <li class="nav-item"><a class="nav-link text-uppercase padding-text Font-Size-1vw" href="{{ route('shop') }}">{{__('STORE')}}</a></li>
                    <li class="nav-item"><a class="nav-link text-uppercase padding-text Font-Size-1vw" href="{{ route('blog.index') }}">{{__('BLOG')}}</a></li>
                    <li class="nav-item"><a class="nav-link text-uppercase padding-text Font-Size-1vw" href="{{ route('contact') }}">{{__('CONTACT')}}</a></li>
                    @if(Route::has('login'))
                        @auth
                        <li class="nav-item"><a class="nav-link text-uppercase padding-text Font-Size-1vw" href="#">PROFILE</a></li>
                        @else
                        <li class="nav-item"><a class="nav-link text-uppercase padding-text Font-Size-1vw" href="{{ route('login') }}">{{__('LOGIN')}}</a></li>
                            @if (Route::has('register'))
                                 <li class="nav-item"><a class="nav-link text-uppercase padding-text Font-Size-1vw" href="{{ route('register') }}">{{__('REGISTER')}}</a>
                            @endif
                        @endif
                    @endif
                    <li class="nav-item" style="margin-top: 5px">
                      <select name="select_language" id="select_language">
                            @foreach($languages as $language)
                                <option value="{{route('setLanguage',$language->slug)}}"
                                    @if(App()->getLocale() == $language->slug)
                                        selected
                                    @endif

                                >{{$language->slug}}</option>
                            @endforeach
                        </select>
                    </li>
                </ul>
                <ul class="navbar-nav position-Ab Display-none3 Low-right" style="right:20%;">
                    <li class="nav-item">
                        <div class="nav-link">
                            <i class="fa fa-search btnSearch" aria-hidden="true"></i>
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav position-Ab Display-none3 Low-right" style="right:20.5%;top: 100%;">
                    <li class="nav-item">
                        <form action="" id="FromSearch">
                            <input type="text" name="search" id="search" class="search fixed-input-search" placeholder="Search...">
                            <button id="ButtonSearch" class="fixed-search"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </form>
                    </li>
                </ul>
            </div> <!-- navbar-collapse.// -->
        </div><!-- container //  -->
    </nav>
    <div id="mySidenav" class="sidenav-Moblie">
        <ul class="navbar-nav">
            <li class="nav-item">
                <div class="nav-link">
                    <i class="fa fa-times btn icon-close-menu" style="font-size: 30px;" id="btnCloseMenu" aria-hidden="true"></i>
                </div>
            </li>
        </ul>
        <div class="box-menu-scroll">
            <div id="scrollMenu">
                <ul class="nav navbar-nav navbar-logo mx-auto Moblie-Fonts-Menu position-Re">
                    <li class="nav-item"><a class="nav-link padding-text" href="#">Home</a> </li>
                    <li class="nav-item"><a class="nav-link padding-text" href="#">Features</a></li>
                    <li class="nav-item"><a class="nav-link padding-text" href="#">Store</a></li>
                    <li class="nav-item"><a class="nav-link padding-text" href="#">Wine</a></li>
                    <li class="nav-item"><a class="nav-link padding-text" href="#">List</a></li>
                    <li class="nav-item"><a class="nav-link padding-text" href="#">Blog</a></li>
                    <li class="nav-item"><a class="nav-link padding-text" href="#">Contacts</a></li>
                </ul>
            </div>
        </div>
        <form>
            <div class="card-body row no-gutters align-items-center search-Bottom">
                <div class="col">
                    <input class="form-control form-control-lg form-control-borderless" type="search" placeholder="Search ...">
                </div>
                <div class="col-auto">
                    <button class="btn btn-lg bg-white" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                </div>
            </div>
        </form>
    </div>
    <div class="vc_empty_space bg-white" style="padding: 0 0 4.1em;"><span class="vc_empty_space_inner"></span></div>
<!--====================================== END MENU ======================================-->

<!--====================================== MAIN ======================================-->
    <main>
        <div class="container-fluid bg-white">
        @yield('content')
        </div>
    </main>
<!--====================================== END MAIN ======================================-->

<!--====================================== FOOTER ======================================-->
<footer class="section-header padding-Header bg-white">
    <div class="container">
        <div class="row justify-content-center">
        <div class="col-xl-3 col-md-3 col-sm-12 Display-None">
            <div class="card card-border-0 flex-row align-items-center h-100">

                <div class="card-block px-2">
                    <p class="card-text Re-font-ms"><span class="Font-dark Font-Size-07vw">ThemeREX © 2020 All rights reserved.</span></p>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-md-6 col-sm-12">
            <a href="{{route('home')}}"><img class="rounded mx-auto d-block" src="{{ asset('images/logo.png') }}" alt=""></a>
        </div>
        <div class="col-xl-3 col-md-3 col-sm-12 Display-None">
            <div class="card card-border-0 flex-row align-items-center h-100">
                <a href="" class="text-dark edit-icon mr-auto-moblie-icon" style="margin-right: 20px;padding: 10px 15px;border: 2px solid #bdb68e">
                    <i class="fa fa-globe Font-dark" aria-hidden="true"></i>
                </a>
                <a href="" class="text-dark edit-icon mr-auto-moblie-icon" style="margin-right: 20px;padding: 10px 15px;border: 2px solid #bdb68e">
                    <i class="fa fa-github Font-dark" aria-hidden="true"></i>
                </a>
                <a href="" class="text-dark edit-icon mr-auto-moblie-icon" style="padding: 10px 15px;border: 2px solid #bdb68e">
                    <i class="fa fa-linkedin-square Font-dark" aria-hidden="true"></i>
                </a>
            </div>
        </div>
        <div class="text-center show-in-moblie" style="display: none;">
            <p class="card-text Re-font-ms" style="padding-top:30px;"><span class="Font-dark">ThemeREX © 2020 All rights reserved.</p>
        </div>
        </div>
    </div>
</footer>
<!--====================================== END FOOTER ======================================-->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script>
    $(document).ready(function (){
        $('#select_language').change(function (){
            var selectedLanguage = $(this).children("option:selected").val();
            window.location.replace(selectedLanguage);
        });
    });
</script>
<script src="{{ asset('js/Scrollstop.js') }}"></script>
@yield('script')
</body>
</html>
