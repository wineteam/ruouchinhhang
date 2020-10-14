<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <base href="{{ asset('') }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'WineTeam') }}</title>

    <!-- Scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
{{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="{{ asset('js/jquery-ui.js') }}"></script>
<script src="{{ asset('js/jquery.backstretch.js') }}"></script>
<script src="{{ asset('js/jquery.backstretch.min.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>
<script src="{{ asset('js/Multi-Item-carousel.js') }}"></script>
<script src="{{ asset('js/Scrollstop.js') }}"></script>
<script src="{{ asset('js/validation.js') }}"></script>
<script src="{{ asset('js/wow.min.js') }}"></script>
<script src="{{ asset('js/wow.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/fontello.css') }}">
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
        <div class="col-xl-3 col-md-3 col-sm-12 Display-None">
            <div class="card card-border-0 flex-row align-items-center h-100">
                <div class="card-header edit-icon rounded-circle">
                    <i class="fa fa-phone" aria-hidden="true"></i>
                </div>
                <div class="card-block px-2">
                    <p class="card-text Re-font-ms"><span class="font-weight-bold Font-Blue">Call us: <a href="" class="Font-Blue">123-456-7890</a></span> <br> info@luxurywine.com</p>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-md-6 col-sm-12">
            <img class="rounded mx-auto d-block" src="images/logo.png" alt="">
        </div>
        <div class="col-xl-3 col-md-3 col-sm-12">
            <div class="card card-border-0 flex-row align-items-center h-100">
                <div class="card-header edit-icon rounded-circle">
                    <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                </div>
                <div class="card-block px-2">
                    <p class="card-text Re-font-ms"><a href=""><span class="font-weight-bold Font-Blue">Your cart:</span> <br> <span class="Font-Yellow">0 items - £0.00</span></a></p>
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
            <button class="navbar-toggler mx-auto" type="button" data-toggle="collapse" data-target="#main_nav">
                <i class="fa fa-bars Font-Yellow" aria-hidden="true"></i>
            </button>
            <div class="collapse navbar-collapse" id="main_nav">
                <ul class="nav navbar-nav navbar-logo mx-auto Blue-Link position-Re">
                    <li class="nav-item"> <a class="nav-link text-uppercase padding-text Font-Size-1vw" href="{{ route('home') }}">Home</a> </li>
                    <li class="nav-item"><a class="nav-link text-uppercase padding-text Font-Size-1vw" href="{{ route('shop') }}">STORE</a></li>
                    <li class="nav-item"><a class="nav-link text-uppercase padding-text Font-Size-1vw" href="{{ route('blog') }}">BLOG</a></li>
                    <li class="nav-item"><a class="nav-link text-uppercase padding-text Font-Size-1vw" href="{{ route('contact') }}">CONTACTS</a></li>
                    @if(Route::has('login'))
                        @auth
                        <li class="nav-item"><a class="nav-link text-uppercase padding-text Font-Size-1vw" href="#">PROFILE</a></li>
                        @else
                        <li class="nav-item"><a class="nav-link text-uppercase padding-text Font-Size-1vw" href="{{ route('login') }}">LOGIN</a></li>
                            @if (Route::has('register'))
                                 <li class="nav-item"><a class="nav-link text-uppercase padding-text Font-Size-1vw" href="{{ route('register') }}">REGISTER</a>
                            @endif
                        @endif
                    @endif
                </ul>
                <ul class="navbar-nav position-Ab" style="right:20%">
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa fa-search" aria-hidden="true"></i></a>
                    </li>
                </ul>
            </div> <!-- navbar-collapse.// -->
        </div><!-- container //  -->
    </nav>
    <div class="vc_empty_space bg-white" style="padding: 0 0 4.1em;"><span class="vc_empty_space_inner"></span></div>
<!--====================================== END MENU ======================================-->

        <main>
            @yield('content')
        </main>

<!--====================================== FOOTER ======================================-->
<footer class="section-header padding-Header bg-white">
    <div class="container">
        <div class="row justify-content-center">
        <div class="col-xl-3 col-md-3 col-sm-12 Display-None">
            <div class="card card-border-0 flex-row align-items-center h-100">

                <div class="card-block px-2">
                    <p class="card-text Re-font-ms"><a href=""><span class="Font-dark Font-Size-07vw">ThemeREX © 2020 All rights reserved.</a></p>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-md-6 col-sm-12">
            <img class="rounded mx-auto d-block" src="images/logo.png" alt="">
        </div>
        <div class="col-xl-3 col-md-3 col-sm-12">
            <div class="card card-border-0 flex-row align-items-center h-100">
                <div class="card-header edit-icon rounded-circle" style="margin-right: 20px;">
                    <i class="fa fa-globe" aria-hidden="true"></i>
                </div>

                <div class="card-header edit-icon rounded-circle" style="margin-right: 20px;">
                    <i class="fa fa-github" aria-hidden="true"></i>
                </div>

                <div class="card-header edit-icon rounded-circle">
                    <i class="fa fa-linkedin-square" aria-hidden="true"></i>
                </div>
            </div>
        </div>
        </div>
    </div>
</footer>
<!--====================================== END FOOTER ======================================-->

</body>
</html>