@extends('layouts.app')
@section('content')


<!--====================================== Title Cart ======================================-->
<div class="container-fluid Title_bg">
    <div>
        <div class="Display-noneX" style="height: 5.5em"><span></span></div>
        <div style="height: 5em"><span></span></div>

        <div class="checkout-bg text-center">
            <h1 class="Font-white">Your Cart</h1>
          <ul class="breadcrumb-page">
            <li><a  href="{{ route('home',app()->getLocale()) }}">{{__('HOME')}}</a></li>
            <li aria-current="page">Cart</li>
          </ul>
        </div>

        <div style="height: 5em"><span></span></div>
        <div class="Display-noneX" style="height: 5.8em"><span></span></div>
    </div>
</div><!-- /.sc_content -->
<!--====================================== END Title Cart ======================================-->
<div class="container-fluid bg-white">
<!--====================================== Empty Space ======================================-->
<div class="vc_empty_space" style="height: 2.5em"><span class="vc_empty_space_inner"></span></div>
<!--====================================== END Empty Space ======================================-->



<div class="px-4 px-lg-0">
    <div class="pb-5">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">

            <!-- Shopping cart table -->

            <div class="Scroll-CartList">
                <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col" class="border-0 bg-Red-I Font-white">
                        <div class="p-2 px-3 text-uppercase">Product</div>
                        </th>
                        <th scope="col" class="border-0 bg-Red-I Font-white">
                        <div class="py-2 text-uppercase">Price</div>
                        </th>
                        <th scope="col" class="border-0 bg-Red-I Font-white">
                        <div class="py-2 text-uppercase">Quantity</div>
                        </th>
                        <th scope="col" class="border-0 bg-Red-I Font-white">
                        <div class="py-2 text-uppercase">Remove</div>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse(Cart::content() as $item)
                    <tr>
                        <th scope="row" class="border-0">
                        <div class="p-2">
                            <img src="{{ $item->model->thumbnail }}" alt="" width="70" class="img-fluid rounded shadow-sm">
                            <div class="ml-3 d-inline-block align-middle">
                            <h5 class="mb-0"> <a href="{{route('shop.show',$item->model->slug)}}" class="text-dark d-inline-block align-middle">{{\Illuminate\Support\Str::limit($item->name,30)}}</a></h5>
                            </div>
                        </div>
                        </th>
                        <td class="border-0 align-middle"><strong>{{number_format($item->price)}}</strong></td>
                        <td class="border-0 align-middle"><strong>{{$item->qty}}</strong></td>
                        <td class="border-0 align-middle">
                          <form action="{{route('cart.destroy',$item->rowId)}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger deleteItem text-light"><i class="fa fa-trash"></i></button>
                          </form>
                        </td>
                    </tr>
                    @empty
                     <tr>
                       <h3 class="text-center text-info">Ban chua mua hang</h3>
                     </tr>
                    @endforelse
                    </tbody>
                </table>
                </div>
            </div>
            <!-- End -->
          </div>
        </div>

        <div class="row py-5 p-4 bg-white rounded shadow-sm">
          @if(session()->has('message'))
          <div class="col-lg-12 mb-3">
            <h4 class="text-danger text-center text-capitalize">{{session()->get('message')}}</h4>
          </div>
          @endif
          <div class="col-lg-6">
            <div class="rounded-pill px-4 py-3 text-uppercase font-weight-bold bg-Red-I Font-white">Coupon code</div>
            <div class="p-4">
              <p class="font-italic mb-4">If you have a coupon code, please enter it in the box below</p>
              <form action="{{route('coupon.store')}}" method="post">
                @csrf
              <div class="input-group mb-4 border rounded-pill p-2">
                  <input type="text" placeholder="Apply coupon" name="coupon_code" aria-describedby="button-addon3" class="form-control border-0">
                  <div class="input-group-append border-0">
                  <button id="button-addon3" type="submit" class="btn btn-dark px-4 rounded-pill"><i class="fa fa-gift mr-2"></i>Apply coupon</button>
                </div>
              </div>
              </form>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="rounded-pill px-4 py-3 text-uppercase font-weight-bold bg-Red-I Font-white">Order summary </div>
            <div class="p-4">
              <p class="font-italic mb-4">Shipping and additional costs are calculated based on values you have entered.</p>
              <ul class="list-unstyled mb-4">
                <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Subtotal </strong><strong>{{number_format(Cart::subtotal())." ".__('$')}}</strong></li>
                @if(session()->has('coupon'))
                <li class="d-flex justify-content-between py-3 border-bottom">
                  <strong class="text-muted">Discount({{session()->get('coupon')['name']}})
                    <form action="{{route('coupon.destroy')}}" method="post">
                      @csrf
                      @method('delete')
                      <button class="btn-sm btn-danger">Remove</button>
                    </form>
                  </strong>
                  <strong>{{number_format(session()->get('coupon')['discount'])." ".__('$')}}</strong>
                </li>
                  <li class="d-flex justify-content-between py-3 border-bottom">
                    <strong class="text-muted">New subtotal</strong>
                    <strong> {{number_format($newSubtotal)." ".__('$')}}</strong>
                  </li>
                  <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">New Tax(60%)</strong><strong>{{number_format($newTax)." ".__('$')}}</strong></li>
                @else
                  <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Tax(60%)</strong><strong>{{ number_format(Cart::tax())." ".__('$')}}</strong></li>
                @endif
                <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Total</strong>
                  <h5 class="font-weight-bold">{{Cart::total()." ".__('$')}}</h5>
                </li>
              </ul><a href="{{route('checkout.index')}}" class="btn btn-dark rounded-pill py-2 btn-block">Procceed to checkout</a>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>



</div>



@endsection
@section('script')
  <script>
    $('.deleteItem').click(function () {
      // escape here if the confirm is false;
      if (!confirm('Are you sure?')) return false;
      var btn = this;
      setTimeout(function () { $(btn).attr('disabled', 'disabled'); }, 1);
      return true;
    });
  </script>
@endsection
