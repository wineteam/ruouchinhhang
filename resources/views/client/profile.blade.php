@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
  		<div class="col-sm-3"><!--left col-->
              

      <div class="text-center">
        <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">
        <h6>Upload a different photo...</h6>
        <input type="file" class="text-center center-block file-upload">
      </div></hr><br>
            
          
        </div><!--/col-3-->
    	<div class="col-sm-9">

            <form action="">

                <div class="col-xl-12 col-md-12 col-sm-12 no-pdd-buyed">
                    <h4 class="mb-3">Billing details</h4>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="firstName">Username</label>
                            <input type="text" class="form-control Fix-input-checkout Fix-high-checkout" id="firstName" placeholder="" value="">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lastName">Last name</label>
                            <input type="text" class="form-control Fix-input-checkout Fix-high-checkout" id="lastName" placeholder="" value="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="firstName">First name</label>
                            <input type="text" class="form-control Fix-input-checkout Fix-high-checkout" id="firstName" placeholder="" value="">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lastName">Last name</label>
                            <input type="text" class="form-control Fix-input-checkout Fix-high-checkout" id="lastName" placeholder="" value="">
                        </div>
                    </div>
            
            
                    
                    <div class="mb-3">
                        <label for="Streetaddress">Street address</label>
                            <input type="text" class="form-control Fix-input-checkout" id="Streetaddress" placeholder="" value="" required>
                        <div class="invalid-feedback">
                            Valid Street address is required.
                        </div>
                    </div>
    
                    <div class="mb-3">
                    <label for="Postcode">Postcode / ZIP <span class="text-muted">(Optional)</span></label>
                    <input type="text" class="form-control Fix-input-checkout Fix-high-checkout" id="Postcode" placeholder="">
                    </div>
            
                    <div class="mb-3">
                        <label for="TownCity">Town / City</label>
                            <input type="text" class="form-control Fix-input-checkout Fix-high-checkout" id="TownCity" placeholder="" value="" required>
                        <div class="invalid-feedback">
                            Valid Town / City is required.
                        </div>
                    </div>
    
                    <div class="mb-3">
                        <label for="Phone">Phone</label>
                            <input type="text" class="form-control Fix-input-checkout Fix-high-checkout" id="Phone" placeholder="" value="" required>
                        <div class="invalid-feedback">
                            Valid Phone is required.
                        </div>
                    </div>
    
                    <div class="mb-3">
                        <label for="Emailaddress">Email address</label>
                            <input type="text" class="form-control Fix-input-checkout Fix-high-checkout" id="Emailaddress" placeholder="" value="" required>
                        <div class="invalid-feedback">
                            Valid Email address is required.
                        </div>
                    </div>
    
                    <h4 class="mb-3">Billing details</h4>
                    <div class="mb-3">
                        <label for="Companyname">Company name <span class="text-muted">(Optional)</span></label>
                        <textarea class="form-control Fix-input-checkout" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                </div>

            </form>
            

        </div><!--/col-9-->
    </div><!--/row-->
@endsection