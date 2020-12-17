@extends('admin.layouts.dashboard')
@section('contentAdmin')
<section id="main-content">
    <section class="wrapper">
      <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>{{__('listorder')}}</h4>
                    <form class="form-inline float-left" method="GET" action="{{route('MngOrder.search')}}">

                      <div class="form-group mx-sm-3 mb-2">

                        <input type="text" class="form-control" id="SearchRow" name="user_name" placeholder="...">
                      </div>
                      <button type="submit" class="btn btn-info mb-2">Tìm kiếm</button>
                    </form>
                    <div class="form-group float-right mr-4">
                      <select class="form-control" id="orderItem" onchange="location = this.value;">
                        <option @if(isset($new)) {{$new}} @endif value="{{route('MngOrder.order','new')}}">{{__('latest')}}</option>
                        <option @if(isset($old)) {{$old}} @endif value="{{route('MngOrder.order','old')}}">{{__('oldest')}}</option>
                      </select>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-bordered mb-0">
                        <thead>
                        <tr>
                            <th scope="col" width="60">#</th>
                            <th scope="col">{{__('name')}} {{__('user')}}</th>
                            <th scope="col" width="400">{{__('address')}}</th>
                            <th scope="col">{{__('Email')}}</th>
                            <th scope="col">{{__('Phone')}}</th>
                            <th scope="col">{{__('Status')}}</th>
                            <th scope="col">Hình thức thanh toán</th>
                            <th scope="col">Mã hóa đơn</th>
                            <th scope="col">{{__('datepurchase')}}</th>
                            <th scope="col">{{__('deliverydate')}}</th>
                            <th scope="col">{{__('totally')}}</th>
                            <th scope="col">{{__('Datecreated')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                          @foreach ($orders as $order)
                            <tr>
                              <td>{{$orderNumber++}}</td>
                              <td><p>{{$order->user_name}}</p></td>
                              <td><p>{{$order->ship_address}}</p></td>
                              <td>{{$order->ship_mail}}</td>
                              <td>{{$order->ship_phone}}</td>
                              <td> @if ($order->status == 1) Đã Giao Hàng @else Chưa Giao Hàng @endif </td>
                              <td> @if ($order->payment_type == 1) Thanh toán Online @else Trả tiền trực tiếp @endif </td>
                              <td>{{$order->bill}}</td>
                              <td>{{$order->day_buy}}</td>
                              <td>{{$order->day_ship}}</td>
                              <td>{{$order->total}}</td>
                              <td>{{\Carbon\Carbon::parse( $order->created_at)->format('d/m/Y')}}</td>
                            </tr>
                          @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12" style="display: flex">
      {{$orders->links()}}
    </div>
    </section>
  </section>
@endsection


