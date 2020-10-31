@extends('layouts.app')
@section('content')
<div class="product-page">
   <!-- Breadcrumb -->
   <div class="banner-page col-lg-12">
    <p class="title-page">All Products</p>
    <ul class="breadcrumb-page">
        <li><a href="{{ route('home',app()->getLocale()) }}">Home</a></li>
        <li aria-current="page">Shop</li>
    </ul>
  </div>


<!-- ==============Product============ -->
<div class="bg-white pt-5 pb-5">
<div class="container">
<div class="row">

  <div class=" col-xl-9 col-md-12 col-sm-12">
    <div class="row pb-3">
      <div class="col-xl-12 col-md-12 col-md-12">
        <div class="float-right w-25">
          <div class="form-group boxSelect">
            <label for="fillter"></label>
            <select class="form-control" name="" id="fillter">
              <option>Default sorting</option>
              <option>Sort by popularity</option>
              <option>Sort by average rating</option>
              <option>Sort by lastest</option>
              <option>Sort by price: low to high</option>
              <option>Sort by price: high to low</option>
            </select>
          </div>
        </div>
      </div>
    </div>
    <div class="row">

      <div class="col-xl-4 col-md-4 col-sm-6 text-center productItem mb-4 Fix-product-pdd">
        <div class="productItem__content">
          <img class="" style="margin-bottom: 1rem;" width="100%" height="auto" src="{{ asset('images/product-1.png') }}" alt="">
          <p>White, Wine</p>
          <h4>2014 California Red</h4>
          <p>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
          </p>
          <p>£200.00 – £230.00</p>
          <button><i class="fa fa-shopping-bag"></i> Buy now</button>
      </div>
      </div>

      <div class="col-xl-4 col-md-4 col-sm-6 text-center productItem mb-4 Fix-product-pdd">
        <div class="productItem__content">
          <img class="" style="margin-bottom: 1rem;" width="100%" height="auto" src="{{ asset('images/product-2.png') }}" alt="">
          <p>White, Wine</p>
          <h4>2014 California Red</h4>
          <p>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
          </p>
          <p>£200.00 – £230.00</p>
          <button><i class="fa fa-shopping-bag"></i> Buy now</button>
      </div>
      </div>

      <div class="col-xl-4 col-md-4 col-sm-6 text-center productItem mb-4 Fix-product-pdd">
        <div class="productItem__content">
          <img class="" style="margin-bottom: 1rem;" width="100%" height="auto" src="{{ asset('images/product-3.png') }}" alt="">
          <p>White, Wine</p>
          <h4>2014 California Red</h4>
          <p>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
          </p>
          <p>£200.00 – £230.00</p>
          <button><i class="fa fa-shopping-bag"></i> Buy now</button>
      </div>
      </div>


      <div class="col-xl-4 col-md-4 col-sm-6 text-center productItem mb-4 Fix-product-pdd">
        <div class="productItem__content">
          <img class="" style="margin-bottom: 1rem;" width="100%" height="auto" src="{{ asset('images/product-1.png') }}" alt="">
          <p>White, Wine</p>
          <h4>2014 California Red</h4>
          <p>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
          </p>
          <p>£200.00 – £230.00</p>
          <button><i class="fa fa-shopping-bag"></i> Buy now</button>
      </div>
      </div>

      <div class="col-xl-4 col-md-4 col-sm-6 text-center productItem mb-4 Fix-product-pdd">
        <div class="productItem__content">
          <img class="" style="margin-bottom: 1rem;" width="100%" height="auto" src="{{ asset('images/product-2.png') }}" alt="">
          <p>White, Wine</p>
          <h4>2014 California Red</h4>
          <p>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
          </p>
          <p>£200.00 – £230.00</p>
          <button><i class="fa fa-shopping-bag"></i> Buy now</button>
      </div>
      </div>

      <div class="col-xl-4 col-md-4 col-sm-6 text-center productItem mb-4 Fix-product-pdd">
        <div class="productItem__content">
          <img class="" style="margin-bottom: 1rem;" width="100%" height="auto" src="{{ asset('images/product-3.png') }}" alt="">
          <p>White, Wine</p>
          <h4>2014 California Red</h4>
          <p>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
          </p>
          <p>£200.00 – £230.00</p>
          <button><i class="fa fa-shopping-bag"></i> Buy now</button>
      </div>
      </div>


    </div>
  </div>

  <div class="col-xl-3 col-md-12 col-sm-12 px-3">
    <div class="row productCategories">
      <div class="col-xl-12 col-md-6 col-sm-12">
        <h4 class="pt-4 pb-3">Product Categories</h4>
        <div class="productCategories__list pl-2 mb-5">
          <a href="#"><i class="fa fa-angle-right"></i>  New Arrivals</a>
          <a href="#"><i class="fa fa-angle-right"></i>  Red Wines</a>
          <a href="#"><i class="fa fa-angle-right"></i>  Rose Wines</a>
          <a href="#"><i class="fa fa-angle-right"></i>  Sparkling</a>
          <a href="#"><i class="fa fa-angle-right"></i>  White Wines</a>
          <a href="#"><i class="fa fa-angle-right"></i>  Uncategorized</a>
        </div>
      </div>

      <div class="col-xl-12 col-md-6 col-sm-12">
        <h4 class="pt-4 pb-3">Filter by price</h4>
        <div class="form-group">
          <input type="range" class="form-control-range" id="formControlRange" min="155" max="365" value="255">
        </div>
        <button class="btn btn-dark">Fillter</button>
        <span class="ml-5 " style="font-size: 15px; color: #c2c0b0;">Price: £155 — £<span id="numberFillter">365</span></span>
      </div>
      <div class="col-xl-12 col-md-6 col-sm-12">
        <h4 class="pt-4 pb-3 mt-5">Product</h4>
        <div class="productList p-3">
          <div class="row">
            <div class="col-4 text-center productList__item">
              <img src="{{ asset('images/product-1.png') }}" alt="" >
            </div>
            <div class="col-8">
              <h6 class="mb-3" style="font-size: 14px;">California Red Wine</h6>
              <h6 style="color: #da3f19; font-size: 14px;">£300.00 – £365.00</h6>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-4 text-center productList__item">
              <img src="{{ asset('images/product-1.png') }}" alt="" >
            </div>
            <div class="col-8">
              <h6 class="mb-3" style="font-size: 14px;">California Red Wine</h6>
              <h6 style="color: #da3f19; font-size: 14px;">£300.00 – £365.00</h6>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-4 text-center productList__item">
              <img src="{{ asset('images/product-1.png') }}" alt="" >
            </div>
            <div class="col-8">
              <p class="mb-3" style="font-size: 14px;">California Red Wine</p>
              <p style="color: #da3f19; font-size: 14px;">£300.00 – £365.00</p>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-4 text-center productList__item">
              <img src="{{ asset('images/product-1.png') }}" alt="" >
            </div>
            <div class="col-8">
              <h6 class="mb-3" style="font-size: 14px;">California Red Wine</h6>
              <h6 style="color: #da3f19; font-size: 14px;">£300.00 – £365.00</h6>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-12 col-md-6 col-sm-12">
        <h4 class="pt-4 pb-3 mt-5">Tags</h4>
        <div class="tagList">
          <p>
          <span>new arrival</span>
          <span>red</span>
          <div class="List-editor"></div>
          <span>sparkling</span>
          <span>vintage</span>
          <div class="List-editor"></div>
          <span>white</span>
          <span>wine</span>
        </p>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
<!-- ==============End Product============ -->
@endsection
