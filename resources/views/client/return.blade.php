@extends('layouts.app')
@section('content')
<div class="container-fluid bg-white">
<!--====================================== Empty Space ======================================-->
<div class="vc_empty_space" style="height: 3.5em"><span class="vc_empty_space_inner"></span></div>
<!--====================================== END Empty Space ======================================-->
    <form action="">
        <div class="row">
            <div class="col-xl-12 col-md-12 col-sm-12">
                <h1 class="mb-3 text-center font-weight-bolder">{{__('checkoutsuccess')}}</h1>
            
                <!-- Show ra nếu đã gửi được Email -->
                <h3 class="text-center"><span class="Font-Blue font-weight-bold">{{__('checkEmail')}}</span></h3>

            </div>
        </div><!--/row-->
    </form>
<!--====================================== Empty Space ======================================-->
<div class="vc_empty_space" style="height: 3.5em"><span class="vc_empty_space_inner"></span></div>
<!--====================================== END Empty Space ======================================-->
</div>
@endsection