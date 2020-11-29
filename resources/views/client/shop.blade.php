@extends('layouts.app')
@section('content')
<div class="product-page">
   <!-- Breadcrumb -->
   <div class="banner-page col-lg-12">
    <p class="title-page text-capitalize">
      @if(session()->has('message'))
        {{session()->get('message')}}
      @else
        {{__('client.all_products')}}
      @endif
    </p>
    <ul class="breadcrumb-page">
        <li><a href="{{ route('home',app()->getLocale()) }}">{{__('client.HOME')}}</a></li>
        <li aria-current="page">{{__('client.STORE')}}</li>
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
            <label for="orderBy"></label>
            <select class="form-control" name="" id="orderBy">
              <option selected value="new">Sắp xếp theo mới -> cũ</option>
              <option value="old">Sắp xếp theo cũ -> mới</option>
            </select>
          </div>
        </div>
      </div>
    </div>
    <div class="row" style="align-items: stretch">
    @foreach($products  as $product)
      <div class="col-xl-4 col-md-4 col-sm-6 text-center productItem mb-4 Fix-product-pdd">
        <div class="productItem__content" style="height: 100%">
          <a href="{{route('shop.show',$product->slug)}}"> <img c style="margin-bottom: 1rem;" width="100%" height="auto" src="{{$product->thumbnail}}" alt=""></a>
          @forelse($product->categories as $category)
            <a href="{{route('getProByCat',$category->slug)}}" class="text-capitalize">{{$category->name}}</a>
            @if(!$loop->last)
              ,
            @endif
          @empty
            <a href="#">Không phân loại</a>
          @endforelse
          <h4><a class="text-danger" href="{{route('shop.show',$product->slug)}}">{{\Illuminate\Support\Str::limit($product->name,14)}}</a></h4>
          <p>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
          </p>
          @if($product->pricePresent('discount') != 0 && $product->pricePresent('discount') != null )
            <p class="text-danger text-center text-capitalize">{{__('client.promotion')}}</p>
            <h4 style="color: #da3f19; ;">
            {{$product->pricePresent('discount')}}
              {{__('client.$')}}
            </h4>
          @else
            <h4 style="color: #da3f19; ;">
              {{$product->pricePresent('price')}}
              {{__('client.$')}}
            </h4>
          @endif
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
        <h4 class="pt-4 pb-3 text-capitalize">{{__('client.product_categories')}}</h4>
        <div class="productCategories__list pl-2 mb-5">
          @foreach($categories as $category)
            <a href="{{route('getProByCat',$category->slug)}}"  class="text-capitalize"><i class="fa fa-angle-right"></i>  {{$category->name}}</a>
          @endforeach
        </div>
      </div>

      <div class="col-xl-12 col-md-6 col-sm-12">
        <h4 class="pt-4 pb-3 text-capitalize">{{__('client.searchProduct')}}</h4>
        <div class="form-group">
          <input type="range" class="form-control-range" id="formControlRange" min="155" max="365" value="255">
        </div>
        <button class="btn btn-dark">{{__('client.filter')}}</button>
        <span class="ml-5 " style="font-size: 15px; color: #c2c0b0;">{{__('client.price')}}: £155 — {{__("$")}}<span id="numberFillter">365</span></span>
      </div>
      <div class="col-xl-12 col-md-6 col-sm-12">
        <h4 class="pt-4 pb-3 mt-5 text-capitalize">{{__('client.top_products')}}</h4>
        <div class="productList p-3">
          @foreach($proOrderBought as $product)
          <div class="row">
            <div class="col-4 text-center productList__item p-0">
              <a href="{{route('shop.show',$product->slug)}}"><img src="{{ $product->thumbnail }}" width="100%" alt="" ></a>
            </div>
            <div class="col-8">
              <h4 class="mb-3" style=";"><a style="font-size:16px;" href="{{route('shop.show',$product->slug)}}">{{ \Illuminate\Support\Str::limit($product->name,40)}}</a></h4>
              @if($product->pricePresent('discount') != 0 && $product->pricePresent('discount') != null )
                <h5 style="color: #da3f19; ;">
                  {{$product->pricePresent('discount')}}
                  {{__('client.$')}}
                </h5>
              @else
                <h5 style="color: #da3f19; ;">
                  {{$product->pricePresent('price')}}
                  {{__('client.$')}}
                </h5>
              @endif
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
@section('script')
  <script>
    $(document).ready(function (){
        let arr = [];
        $.ajax({
          url: "/shop/getProducts",
          type: "get"
        }).done(function (response){
          arr.push(response);
        })
      console.log(arr);
    })
  </script>
@endsection
