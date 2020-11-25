@extends('layouts.app')
@section('content')
<div class="product-page">
   <!-- Breadcrumb -->
   <div class="banner-page col-lg-12">
    <p class="title-page text-capitalize">
      @if(session()->has('message'))
        {{session()->get('message')}}
      @else
        {{__('all_products')}}
      @endif
    </p>
    <ul class="breadcrumb-page">
        <li><a href="{{ route('home',app()->getLocale()) }}">{{__('HOME')}}</a></li>
        <li aria-current="page">{{__('STORE')}}</li>
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
              <option selected value="nto">Sắp xếp theo mới -> cũ</option>
              <option value="otn">Sắp xếp theo cũ -> mới</option>
            </select>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
    @foreach($products  as $product)
      <div class="col-xl-4 col-md-4 col-sm-6 text-center productItem mb-4 Fix-product-pdd">
        <div class="productItem__content">
          <a href="{{route('shop.show',$product->slug)}}"> <img class="" style="margin-bottom: 1rem;" width="100%" height="auto" src="{{ asset('images/product-1.png') }}" alt=""></a>
          @forelse($product->categories as $category)
            <a href="{{route('getProByCat',$category->slug)}}" style="font-size: 14px" class="text-capitalize">{{$category->name}}</a>
            @if(!$loop->last)
              ,
            @endif
          @empty
            <a href="#">Không phân loại</a>
          @endforelse
          <h4><a class="text-danger" href="{{route('shop.show',$product->slug)}}">{{\Illuminate\Support\Str::limit($product->name,14)}}</a></h4>
{{--          <p>--}}
{{--            <i class="fa fa-star"></i>--}}
{{--            <i class="fa fa-star"></i>--}}
{{--            <i class="fa fa-star"></i>--}}
{{--            <i class="fa fa-star"></i>--}}
{{--            <i class="fa fa-star"></i>--}}
{{--          </p>--}}
          <h6 style="color: #da3f19; font-size: 14px;">
            @if($product->pricePresent('minPrice') === $product->pricePresent('maxPrice') )
              {{$product->pricePresent('minPrice')}}
            @else
              {{$product->pricePresent('minPrice') ."-".$product->pricepresent('maxPrice')}}
            @endif
            {{__('$')}}</h6>
          <a href=""class="btn-subtitle"><span class=""><span class="">{{__('buy_now')}}</span></span></a>
      </div>
      </div>
      @endforeach

      <div class="col-md-12" style="display: flex;justify-content: center">
        {{$products->links()}}
      </div>
    </div>
  </div>

  <div class="col-xl-3 col-md-12 col-sm-12 px-3">
    <div class="row productCategories">
      <div class="col-xl-12 col-md-6 col-sm-12">
        <h4 class="pt-4 pb-3 text-capitalize">{{__('product_categories')}}</h4>
        <div class="productCategories__list pl-2 mb-5">
          @foreach($categories as $category)
          <a href="{{route('getProByCat',$category->slug)}}"  class="text-capitalize"><i class="fa fa-angle-right"></i>  {{$category->name}}</a>
          @endforeach
        </div>
      </div>

      <div class="col-xl-12 col-md-6 col-sm-12">
        <h4 class="pt-4 pb-3 text-capitalize">{{__('searchProduct')}}</h4>
        <div class="form-group">
          <input type="range" class="form-control-range" id="formControlRange" min="155" max="365" value="255">
        </div>
        <button class="btn btn-dark">{{__('filter')}}</button>
        <span class="ml-5 " style="font-size: 15px; color: #c2c0b0;">{{__('price')}}: £155 — {{__("$")}}<span id="numberFillter">365</span></span>
      </div>
      <div class="col-xl-12 col-md-6 col-sm-12">
        <h4 class="pt-4 pb-3 mt-5 text-capitalize">{{__('top_products')}}</h4>
        <div class="productList p-3">
          @foreach($proOrderBought as $product)
          <div class="row">
            <div class="col-4 text-center productList__item">
              <a href="{{route('shop.show',$product->slug)}}"><img src="{{ asset('images/product-1.png') }}" alt="" ></a>
            </div>
            <div class="col-8">
              <h6 class="mb-3" style="font-size: 14px;"><a href="{{route('shop.show',$product->slug)}}">{{ \Illuminate\Support\Str::limit($product->name,40)}}</a></h6>
              <h6 style="color: #da3f19; font-size: 14px;">
                @if($product->pricePresent('minPrice') === $product->pricePresent('maxPrice') )
                  {{$product->pricePresent('minPrice')}}
                @else
                  {{$product->pricePresent('minPrice') ."-".$product->pricepresent('maxPrice')}}
                @endif
                {{__('$')}}
              </h6>
            </div>
          </div>
          <hr>
          @endforeach
        </div>
      </div>
      <div class="col-xl-12 col-md-6 col-sm-12">
        <h4 class="pt-4 pb-3 mt-5">Tags</h4>
        <div class="tagList">
          @foreach($tagPrimary as $tag)
            <a href="{{route('shop.search.tag',$tag->slug)}}" style="padding: 8px 15px;border: 1px solid #485460;color: #000000;display: inline-block;margin: 5px">{{$tag->name}}</a>
          @endforeach
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
