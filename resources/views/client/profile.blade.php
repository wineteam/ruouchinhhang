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
                      <img src="{{ asset('images/avatar_noImg.png') }}" id="ImagesShow" class="avatar img-circle img-thumbnail" alt="avatar">
                  </div>
                  <h6 class="pdg-images">Upload a different photo...</h6>
                  <input type='file' name="file-images" onchange="readURL_Images(this);"/>
              </div></hr><br>
              <script src="{{ asset('js/imagesShow.js') }}"></script>
  
              <ul class="list-group">
                  <li class="list-group-item text-muted">Menu Profile</li>      
                  <li class="list-group-item text-right"><a href="/changePass" class="Font-Red"><span class="pull-left">Your Profile</span></a></li>
                  <li class="list-group-item text-right"><a href="/changePass" class="Font-Red"><span class="pull-left">Change password</span></a></li>
                  <li class="list-group-item text-right"><a href="/forgot" class="Font-Red"><span class="pull-left">Forgot password</span></a></li>
              </ul> 
              <div class="vc_empty_space" style="height: 3.5em"><span class="vc_empty_space_inner"></span></div>
          </div>
  
          <div class="col-xl-8 col-md-12 col-sm-12">
                <h3 class="mb-3">First - Last Name</h3>
    
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstName">First name</label>
                        <input type="text" class="form-control Profile-Input Fix-high-checkout" id="firstName" value="First Name">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName">Last name</label>
                        <input type="text" class="form-control Profile-Input Fix-high-checkout" id="lastName" value="Last Name">
                    </div>
                </div>
                
                <div class="mb-3">
                    <label for="Companyname">Email</label>
                    <input type="text" class="form-control Profile-Input Fix-high-checkout" id="Companyname" value="Email@gmail.com" disabled>
                </div>
        
                <div class="mb-3">
                    <label for="Companyname">Phone Number</label>
                    <input type="text" class="form-control Profile-Input Fix-high-checkout" id="Companyname" value="0912345678" disabled>
                </div>
    
                <div class="mb-3">
                    <label for="Companyname">Street address</label>
                    <input type="text" class="form-control Profile-Input Fix-high-checkout" id="Companyname" value="201/2 - Cach Mang Thang 8">
                </div>

                <!-- Show ra nếu đã save thành công -->
                <p><span class="Font-Blue font-weight-bold">Successfully saved.</span></p>

                <button class="btn btn-red-checkout" type="submit"><span style="font-size: 13pt">Save</span></button>
            </div>
        </div><!--/row-->
    </form>
<!--====================================== Empty Space ======================================-->
<div class="vc_empty_space" style="height: 3.5em"><span class="vc_empty_space_inner"></span></div>
<!--====================================== END Empty Space ======================================-->
</div>
@endsection