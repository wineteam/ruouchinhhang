@extends('layouts.app')
@section('content')
<div class="container-fluid bg-white">
<!--====================================== Empty Space ======================================-->
<div class="vc_empty_space" style="height: 3.5em"><span class="vc_empty_space_inner"></span></div>
<!--====================================== END Empty Space ======================================-->
    <form action="">
        <div class="row">
            <div class="col-xl-4 col-md-12 col-sm-12"><!--left col-->
              <div class="text-center">
                  <div class="max-height-imagess">
                    @if(Auth::user()->avatar == NULL)
                        <img src="{{ asset('images/avatar_noImg.png') }}" id="ImagesShow" class="avatar img-circle img-thumbnail" alt="avatar">
                    @else
                        <img src="{{ Auth::user()->avatar }}" id="ImagesShow" class="avatar img-circle img-thumbnail" alt="avatar">
                    @endif  
                  </div>
                <h6 class="pdg-images">{{__('Uploadadifferentphoto')}}</h6>
                  <input type='file' name="file-images" onchange="readURL_Images(this);"/>
              </div></hr><br>
              <script src="{{ asset('js/imagesShow.js') }}"></script>
  
              <ul class="list-group">
                <li class="list-group-item text-muted">{{__('Menu_profile')}}</li>      
                <li class="list-group-item text-right"><a href="{{ route('home') }}" class="Font-Red"><span class="pull-left">{{__('HOME')}}</span></a></li>
                <li class="list-group-item text-right"><a href="{{ route('password.request') }}" class="Font-Red"><span class="pull-left">{{__('Forgotpassword')}}</span></a></li>
              </ul>
              <div class="vc_empty_space" style="height: 3.5em"><span class="vc_empty_space_inner"></span></div>
          </div>
  
          <div class="col-xl-8 col-md-12 col-sm-12">
                <h3 class="mb-3">{{__('infoProfile')}} {{Auth::user()->name}}</h3>
    
                <div class="row">
                    <div class="col-md-12 mb-3">
                    <label for="firstName">{{__('name_user')}}</label>
                        <input type="text" class="form-control Profile-Input Fix-high-checkout" id="firstName" value="{{Auth::user()->name}}">
                    </div>
                </div>
                
                <div class="mb-3">
                    <label for="Companyname">{{__('Email')}}</label>
                    <input type="text" class="form-control Profile-Input Fix-high-checkout" id="Companyname" value="{{Auth::user()->email}}" disabled>
                </div>
        
                <div class="mb-3">
                    <label for="Companyname">{{__('Phone')}}</label>
                    <input type="text" class="form-control Profile-Input Fix-high-checkout" id="Companyname" value="{{Auth::user()->phone}}" disabled>
                </div>
    
                <div class="mb-3">
                <label for="Companyname">{{__('address')}}</label>
                    <input type="text" class="form-control Profile-Input Fix-high-checkout" id="Companyname" value="{{Auth::user()->address}}">
                </div>

                <!-- Show ra nếu đã save thành công -->
                <p><span class="Font-Blue font-weight-bold">Successfully saved.</span></p>

                <button class="btn btn-red-checkout" type="submit"><span style="font-size: 13pt">{{__('Save')}}</span></button>
            </div>
        </div><!--/row-->
    </form>
<!--====================================== Empty Space ======================================-->
<div class="vc_empty_space" style="height: 3.5em"><span class="vc_empty_space_inner"></span></div>
<!--====================================== END Empty Space ======================================-->
</div>
@endsection