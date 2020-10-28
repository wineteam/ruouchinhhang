@extends('layouts.app')

@section('content')

<!--====================================== SLIDE SHOW ======================================-->
<div id="carouselIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators carousel-indicators-Fix">
    <li class="carousel-items" data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
    <li class="carousel-items" data-target="#carouselIndicators" data-slide-to="1"></li>
    <li class="carousel-items" data-target="#carouselIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
    <div class="carousel-item active">
        <a href="">
            <img class="d-block w-100" src="{{ asset('images/slider_bg_1_1.jpg') }}" alt="First slide">
            <div class="carousel-caption d-none d-md-block FIX-Carousel-Caption">
                <h1 style="padding-bottom: 10px;" class="Font-Yellow text-left carousel-SlideShow Forum">New Luxury Wine<br>from France</h1>
                <p class="Font-dark text-left Edit-Font-Size-SlideShow">Our friendly wine experts have put their experience and knowledge to good use building our collection of balanced and available wines. </p>
                <a href=""class="btn-subtitle btn-subtitle-Sildeshow Display-noneX" style="float: left;">Learn More</a>
            </div>
        </a>
    </div>
    <div class="carousel-item">
        <a href="">
            <img class="d-block w-100" src="{{ asset('images/slide_1_2.jpg') }}" alt="Second slide">
            <div class="carousel-caption d-none d-md-block FIX-Carousel-Caption">
                <h1 style="padding-bottom: 10px;" class="Font-Yellow text-left carousel-SlideShow Forum">Season of tasting<br>on Luxury Wine</h1>
                <p class="Font-dark text-left Edit-Font-Size-SlideShow">We offer a great variety of wines for every price point and any occasion, from rich and lemony Chardonnay to elegant and creamy brut.  </p>
                <a href=""class="btn-subtitle btn-subtitle-Sildeshow Display-noneX" style="float: left;">Learn More</a>
            </div>
        </a>
    </div>
    <div class="carousel-item">
        <a href="">
            <img class="d-block w-100" src="{{ asset('images/slide_1_3.jpg') }}" alt="Third slide">
            <div class="carousel-caption d-none d-md-block FIX-Carousel-Caption">
                <h1 style="padding-bottom: 10px;" class="Font-Yellow text-left carousel-SlideShow Forum">Market<br>Seasonal Discounts  </h1>
                <p class="Font-dark text-left Edit-Font-Size-SlideShow">We are extremely proud to introduce 2012 Duckhorn Vineyards Napa Valley Chardonnay. Purchase 10 bottles of this wine and get 20% off!</p>
                <a href=""class="btn-subtitle btn-subtitle-Sildeshow Display-noneX" style="float: left;">Learn More</a>
            </div>
        </a>
    </div>
    </div>
</div>
<!--====================================== END SLIDE SHOW ======================================-->
<div class="container-fluid bg-white">  <!-- Dang Lam Viec -->
<!--====================================== Empty Space ======================================-->
<div class="vc_empty_space" style="height: 8.4em"><span class="vc_empty_space_inner"></span></div>
<!--====================================== END Empty Space ======================================-->
<!--====================================== Empty Space ======================================-->
<div class="vc_empty_space" style="height: 8.4em"><span class="vc_empty_space_inner"></span></div>
<!--====================================== END Empty Space ======================================-->
<!--====================================== Recommendations ======================================-->
<div class="container">
<div class="row">
    <div class="col-sm-12 my-auto">
        <h6 class="text-center Font-Red item_subtitle">Our Products</h6>
        <h1 class="text-center">Preferred Products</h1>
        <div class="text-center item_descr">We offer a great variety of wines for every price point and any occasion, from rich<br>shardonnay to elegant and creamy brut.</div>
    </div>
</div>
</div>
<!--====================================== END Recommendations ======================================-->
<!--====================================== Empty Space ======================================-->
<div class="vc_empty_space" style="height: 3.5em"><span class="vc_empty_space_inner"></span></div>
<!--====================================== END Empty Space ======================================-->
<!--====================================== CATALOG LIST ======================================-->
<div class="container">
<div class="row">
    <div class="MultiCarousel" data-items="1,2,3,4" data-slide="1" id="MultiCarousel"  data-interval="1000">
        <div class="MultiCarousel-inner">
            @forelse($products as $item)
            <div class="item">
                <div class="bg-white" style="position: relative;">
                    <a href="">
                        <div class="circle-box text-center">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </div>
                    </a>
                    <img class="" style="margin-bottom: 1rem;" width="100%" height="auto" src="{{ asset('images/product-4.png') }}" alt="">
                    @forelse($item->categories as $category)
                    <a href="#" class="text-center text-info text-uppercase Font-Size-07vw">{{$category->name}}</a>
                        @if(!$loop->last)
                            ,
                        @endif
                    @empty
                        <span class="text-center text-info Font-Size-07vw">Không có danh mục</span>
                    @endforelse
                        <div class="col-12 mx-auto" style="padding: 20px;">
                        <a class="Hover-Red" href=""><h5 class="Font-Blue" style="height: 50px;transition: 0.3s;">{{$item->id}}{{\Illuminate\Support\Str::limit($item->name,15  )}}</h5></a>
                        <h5 class="Font-Red" style="margin-bottom: 1.5rem;">{{$item->presentPrice()}} vnđ</h5>
                        <a href=""class="btn-subtitle"><span class=""><span class="">Buy Now</span></span></a>
                    </div>
                </div>
            </div>
            @empty
            <h5>Thêm sản phẩm để hiển thị ở đây</h5>
            @endforelse


        </div>
        <div class="btn btn-white-Op-50 leftLst"><i class="fa fa-arrow-left" aria-hidden="true"></i></div>
        <div class="btn btn-white-Op-50 rightLst"><i class="fa fa-arrow-right" aria-hidden="true"></i></div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 text-center">
        <br/><br/><br/>
        <hr/>
    </div>
</div>
</div>
<script src="{{ asset('js/Multi-Item-Carousel.js') }}"></script>
<!--====================================== END CATALOG LIST ======================================-->
<!--====================================== Recommendations 2 ======================================-->
<div class="container">
    <div class="row">
        <div class="col-sm-12 my-auto">
            <h1 class="text-center fixed-font-size-h1">Recommendations</h1>
            <div class="text-center item_descr">We offer a great variety of wines for every price point and any occasion, from rich<br>shardonnay to elegant and creamy brut.</div>
        </div>
    </div>
</div>
<!--====================================== END Recommendations 2 ======================================-->
<!--====================================== Empty Space ======================================-->
<div class="vc_empty_space" style="height: 3.5em"><span class="vc_empty_space_inner"></span></div>
<!--====================================== END Empty Space ======================================-->
<!--====================================== CATALOG FILTER ======================================-->
    <div class="container">
        <div class="row align-items-center h-100" style="margin-bottom: 65px; text-align: center; z-index: 70;">
            <div class="col-6 col-10 mx-auto">
                <div id="myBtnContainer" class="text-center">
                    <button class="btnfilter nobtnshow" onclick="filterSelection('all')">
                        <img class="rounded mx-auto d-block" style="margin-bottom: 0.3rem;" width="40" height="auto" src="images/wine-glass.png" alt="">
                        <span class="text-center Font-Size-1vw">Filter - All</span>
                    </button>

                    <button class="btnfilter nobtnshow" onclick="filterSelection('White-Wines')">
                        <img class="rounded mx-auto d-block" style="margin-bottom: 0.3rem;" width="40" height="auto" src="images/wine-glass.png" alt="">
                        <span class="text-center Font-Size-1vw">White Wines</span>
                    </button>
                    <button class="btnfilter nobtnshow" onclick="filterSelection('Rose-Wines')">
                        <img class="rounded mx-auto d-block" style="margin-bottom: 0.3rem;" width="40" height="auto" src="images/wine-glass.png" alt="">
                        <span class="text-center Font-Size-1vw">Rose Wines</span>
                    </button>
                    <button class="btnfilter nobtnshow" onclick="filterSelection('Red-Wines')">
                        <img class="rounded mx-auto d-block" style="margin-bottom: 0.3rem;" width="40" height="auto" src="images/wine-glass.png" alt="">
                        <span class="text-center Font-Size-1vw">Red Wines</span>
                    </button>
                    <button class="btnfilter nobtnshow" onclick="filterSelection('Sparkling')">
                        <img class="rounded mx-auto d-block" style="margin-bottom: 0.3rem;" width="40" height="auto" src="images/wine-glass.png" alt="">
                        <span class="text-center Font-Size-1vw">Sparkling</span>
                    </button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3 col-md-4 col-sm-6 filterDiv padding-less White-Wines show">
                <div>
                    <div class="bg-white" style="position: relative; margin-top: 1rem;">
                        <a href="">
                            <div class="circle-box text-center">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </div>
                        </a>
                        <img class="" style="margin-bottom: 1rem;" width="100%" height="auto" src="{{ asset('images/product-1.png') }}" alt="">
                        <span class="text-center Font-Size-07vw">New-Arrivals,White-Wines</span>
                        <div class="col-12 mx-auto" style="padding: 20px;">
                            <a class="Hover-Red" href=""><h5 class="Font-Blue" style="height: 50px;transition: 0.3s;">Cabernet Sauvignon Reserve</h5></a>
                            <h5 class="Font-Red" style="margin-bottom: 1.5rem;">£26000 – £34000</h5>
                            <a href=""class="btn-subtitle"><span class=""><span class="">Buy Now</span></span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-4 col-sm-6 filterDiv padding-less Rose-Wines Sparkling show">
                <div>
                    <div class="bg-white" style="position: relative; margin-top: 1rem;">
                        <a href="">
                            <div class="circle-box text-center">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </div>
                        </a>
                        <img class="" style="margin-bottom: 1rem;" width="100%" height="auto" src="{{ asset('images/product-2.png') }}" alt="">
                        <span class="text-center Font-Size-07vw">New-Arrivals,White-Wines</span>
                        <div class="col-12 mx-auto" style="padding: 20px;">
                            <a class="Hover-Red" href=""><h5 class="Font-Blue" style="height: 50px;transition: 0.3s;">Lambert Sweet White</h5></a>
                            <h5 class="Font-Red" style="margin-bottom: 1.5rem;">£14000 – £17000</h5>
                            <a href=""class="btn-subtitle"><span class=""><span class="">Buy Now</span></span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-4 col-sm-6 filterDiv padding-less Rose-Wines White-Wines show">
                <div>
                    <div class="bg-white" style="position: relative; margin-top: 1rem;">
                        <a href="">
                            <div class="circle-box text-center">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </div>
                        </a>
                        <img class="" style="margin-bottom: 1rem;" width="100%" height="auto" src="{{ asset('images/product-3.png') }}" alt="">
                        <span class="text-center Font-Size-07vw">New-Arrivals,White-Wines</span>
                        <div class="col-12 mx-auto" style="padding: 20px;">
                            <a class="Hover-Red" href=""><h5 class="Font-Blue" style="height: 50px;transition: 0.3s;">2014 California Red</h5></a>
                            <h5 class="Font-Red" style="margin-bottom: 1.5rem;">£20000 – £23000</h5>
                            <a href=""class="btn-subtitle"><span class=""><span class="">Buy Now</span></span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-4 col-sm-6 filterDiv padding-less Red-Wines Sparkling show">
                <div>
                    <div class="bg-white" style="position: relative; margin-top: 1rem;">
                        <a href="">
                            <div class="circle-box text-center">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </div>
                        </a>
                        <img class="" style="margin-bottom: 1rem;" width="100%" height="auto" src="{{ asset('images/product-4.png') }}" alt="">
                        <span class="text-center Font-Size-07vw">New-Arrivals,White-Wines</span>
                        <div class="col-12 mx-auto" style="padding: 20px;">
                            <a class="Hover-Red" href=""><h5 class="Font-Blue" style="height: 50px;transition: 0.3s;">Pink Moscato Rose Wine</h5></a>
                            <h5 class="Font-Red" style="margin-bottom: 1.5rem;">£18600 – £22200</h5>
                            <a href=""class="btn-subtitle"><span class=""><span class="">Buy Now</span></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--====================================== END CATALOG FILTER ======================================-->
</div> <!-- Dang Lam Viec -->
<!--====================================== Empty Space ======================================-->
<div class="vc_empty_space" style="height: 10.34em"><span class="vc_empty_space_inner"></span></div>
<!--====================================== END Empty Space ======================================-->
<!--====================================== Carousel with Multiple Items ======================================-->
<div class="container">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="row">
                    <div class="col-xl-4 col-md-12 col-sm-12 nopadding bg-white glowing-moblie">
                        <div class="blogger_padding_text blogger_classic">
                            <div class="vc_empty_space" style="height: 2.8em"><span class="vc_empty_space_inner"></span></div>
                            <div id="" class="">
                                <a href=""><span class="day">14</span><span class="Font-dark"> August</span></a>
                                <h5 class="sc_item_title" style="margin-top: 30px;">Varietal Labelling Of New World Wines</h5>
                                <div class="mr-subtitle">
                                    <a href=""class="btn-subtitle"><span class=""><span class="">Learn More</span></span></a>
                                </div>
                            </div>
                            <div class="vc_empty_space" style="height: 3.2em"><span class="vc_empty_space_inner"></span></div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-12 col-sm-12 nopadding bg-white glowing-moblie">
                        <div class="blogger_padding_text blogger_classic">
                            <div class="vc_empty_space" style="height: 2.8em"><span class="vc_empty_space_inner"></span></div>
                            <div id="" class="">
                                <a href=""><span class="day">15</span><span class="Font-dark"> August</span></a>
                                <h5 class="sc_item_title" style="margin-top: 30px;">Varietal Labelling Of New World Wines</h5>
                                <div class="mr-subtitle">
                                    <a href=""class="btn-subtitle"><span class=""><span class="">Learn More</span></span></a>
                                </div>
                            </div>
                            <div class="vc_empty_space" style="height: 3.2em"><span class="vc_empty_space_inner"></span></div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-12 col-sm-12 nopadding bg-white glowing-moblie">
                        <div class="blogger_padding_text blogger_classic">
                            <div class="vc_empty_space" style="height: 2.8em"><span class="vc_empty_space_inner"></span></div>
                            <div id="" class="">
                                <a href=""><span class="day">16</span><span class="Font-dark"> August</span></a>
                                <h5 class="sc_item_title" style="margin-top: 30px;">Varietal Labelling Of New World Wines</h5>
                                <div class="mr-subtitle">
                                    <a href=""class="btn-subtitle"><span class=""><span class="">Learn More</span></span></a>
                                </div>
                            </div>
                            <div class="vc_empty_space" style="height: 3.2em"><span class="vc_empty_space_inner"></span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="row">
                    <div class="col-xl-4 col-md-12 col-sm-12 nopadding bg-white glowing-moblie">
                        <div class="blogger_padding_text blogger_classic">
                            <div class="vc_empty_space" style="height: 2.8em"><span class="vc_empty_space_inner"></span></div>
                            <div id="" class="">
                                <a href=""><span class="day">14</span><span class="Font-dark"> August</span></a>
                                <h5 class="sc_item_title" style="margin-top: 30px;">Varietal Labelling Of New World Wines</h5>
                                <div class="mr-subtitle">
                                    <a href=""class="btn-subtitle"><span class=""><span class="">Learn More</span></span></a>
                                </div>
                            </div>
                            <div class="vc_empty_space" style="height: 3.2em"><span class="vc_empty_space_inner"></span></div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-12 col-sm-12 nopadding bg-white glowing-moblie">
                        <div class="blogger_padding_text blogger_classic">
                            <div class="vc_empty_space" style="height: 2.8em"><span class="vc_empty_space_inner"></span></div>
                            <div id="" class="">
                                <a href=""><span class="day">15</span><span class="Font-dark"> August</span></a>
                                <h5 class="sc_item_title" style="margin-top: 30px;">Varietal Labelling Of New World Wines</h5>
                                <div class="mr-subtitle">
                                    <a href=""class="btn-subtitle"><span class=""><span class="">Learn More</span></span></a>
                                </div>
                            </div>
                            <div class="vc_empty_space" style="height: 3.2em"><span class="vc_empty_space_inner"></span></div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-12 col-sm-12 nopadding bg-white glowing-moblie">
                        <div class="blogger_padding_text blogger_classic">
                            <div class="vc_empty_space" style="height: 2.8em"><span class="vc_empty_space_inner"></span></div>
                            <div id="" class="">
                                <a href=""><span class="day">16</span><span class="Font-dark"> August</span></a>
                                <h5 class="sc_item_title" style="margin-top: 30px;">Varietal Labelling Of New World Wines</h5>
                                <div class="mr-subtitle">
                                    <a href=""class="btn-subtitle"><span class=""><span class="">Learn More</span></span></a>
                                </div>
                            </div>
                            <div class="vc_empty_space" style="height: 3.2em"><span class="vc_empty_space_inner"></span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="row">
                    <div class="col-xl-4 col-md-12 col-sm-12 nopadding bg-white glowing-moblie">
                        <div class="blogger_padding_text blogger_classic">
                            <div class="vc_empty_space" style="height: 2.8em"><span class="vc_empty_space_inner"></span></div>
                            <div id="" class="">
                                <a href=""><span class="day">14</span><span class="Font-dark"> August</span></a>
                                <h5 class="sc_item_title" style="margin-top: 30px;">Varietal Labelling Of New World Wines</h5>
                                <div class="mr-subtitle">
                                    <a href=""class="btn-subtitle"><span class=""><span class="">Learn More</span></span></a>
                                </div>
                            </div>
                            <div class="vc_empty_space" style="height: 3.2em"><span class="vc_empty_space_inner"></span></div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-12 col-sm-12 nopadding bg-white glowing-moblie">
                        <div class="blogger_padding_text blogger_classic">
                            <div class="vc_empty_space" style="height: 2.8em"><span class="vc_empty_space_inner"></span></div>
                            <div id="" class="">
                                <a href=""><span class="day">15</span><span class="Font-dark"> August</span></a>
                                <h5 class="sc_item_title" style="margin-top: 30px;">Varietal Labelling Of New World Wines</h5>
                                <div class="mr-subtitle">
                                    <a href=""class="btn-subtitle"><span class=""><span class="">Learn More</span></span></a>
                                </div>
                            </div>
                            <div class="vc_empty_space" style="height: 3.2em"><span class="vc_empty_space_inner"></span></div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-12 col-sm-12 nopadding bg-white glowing-moblie">
                        <div class="blogger_padding_text blogger_classic">
                            <div class="vc_empty_space" style="height: 2.8em"><span class="vc_empty_space_inner"></span></div>
                            <div id="" class="">
                                <a href=""><span class="day">16</span><span class="Font-dark"> August</span></a>
                                <h5 class="sc_item_title" style="margin-top: 30px;">Varietal Labelling Of New World Wines</h5>
                                <div class="mr-subtitle">
                                    <a href=""class="btn-subtitle"><span class=""><span class="">Learn More</span></span></a>
                                </div>
                            </div>
                            <div class="vc_empty_space" style="height: 3.2em"><span class="vc_empty_space_inner"></span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!--====================================== END Carousel with Multiple Items ======================================-->
<!--====================================== Empty Space ======================================-->
<div class="vc_empty_space" style="height: 9.7em"><span class="vc_empty_space_inner"></span></div>
<!--====================================== END Empty Space ======================================-->
<!--====================================== Contact find US in Google ======================================-->
<div class="container-fluid bg-white">
    <div class="row">
        <div class="col-xl-6 col-md-6 col-sm-12 nopadding bg-purple " style="overflow: hidden;">
            <img style="right: 0;width: 110%;position: relative;" src="{{ asset('images/contact.jpg') }}" alt="">
            <div class="contact-home">

                <div style="padding-left: 80px;padding-right: 5rem;padding-top: 3rem;">
                    <h6 class="item_subtitle color_subtitle">Get in Touch</h6>
                    <h1 class="sc_item_title Font-white" style="font-size: 2.8vw;">Contacts</h1>
                    <div class="item_descr3 Font-Yellow2" style="width: auto;">We offer a great variety for every price point and any occasion, <br> from rich shardonnay to creamy brut.</div>
                    <div class="item_descr2 Font-Yellow2" style="width: auto;">Address: Austria, Vienna Leip Strasse 156</div>
                    <div class="item_descr2 Font-Yellow2" style="width: auto;">Phone: <a href=""><span class="Font-Red">+125 256 36 85</span></a></div>
                    <div class="item_descr2 Font-Yellow2" style="width: auto;">E-mail: <a href=""><span class="Font-Red">office@luxurywine.com</span></a></div>
                    <div class="mr-subtitle Display-None2">
                        <a href=""class="btn-subtitle-contact Display-None4" style="float: left;">Get In Touch</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-md-6 col-sm-12 nopadding with-high-moblie">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2770.76689176222!2d106.62898165919992!3d10.852871199767703!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317529e76ef4ac4d%3A0x30d6a9932e802efe!2sFPT%20Polytechnic%20HCM%20-%20C%C6%A1%20s%E1%BB%9F%203!5e0!3m2!1svi!2s!4v1601211056224!5m2!1svi!2s"
            width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
    </div>
</div>
<!--====================================== END Contact find US in Google ======================================-->

    @endsection
