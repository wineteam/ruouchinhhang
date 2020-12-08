@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('css/nganluong.css')}}">
<?php	
if(@$_POST['nlpayment']) {
	include('config/config.php');	
	include('config/NL_Checkoutv3.php');	
	$nlcheckout= new NL_CheckOutV3(MERCHANT_ID,MERCHANT_PASS,RECEIVER,URL_API);
	$total_amount=$_POST['total_amount'];
	 
	 $array_items[0]= array('item_name1' => 'Product name',
					 'item_quantity1' => 1,
					 'item_amount1' => $total_amount,
					 'item_url1' => 'http://nganluong.vn/');
					 
	// $array_items=array();				 
	 $payment_method =$_POST['option_payment'];
	 $bank_code = @$_POST['bankcode'];
	 $order_code ="macode_".time();
	
	 $payment_type ='';
	 $discount_amount =0;
	 $order_description='';
	 $tax_amount=0;
	 $fee_shipping=0;
	 $return_url ='http://localhost/nganluong.vn/checkoutv3/payment_success.php';
	 $cancel_url =urlencode('http://localhost/nganluong.vn/checkoutv3?orderid='.$order_code) ;
	
	 $buyer_fullname =$_POST['buyer_fullname'];
	 $buyer_email =$_POST['buyer_email'];
	 $buyer_mobile =$_POST['buyer_mobile'];
	 
	 $buyer_address ='';
	 
	 
	 
	
	if($payment_method !='' && $buyer_email !="" && $buyer_mobile !="" && $buyer_fullname !="" && filter_var( $buyer_email, FILTER_VALIDATE_EMAIL )  ){
		if($payment_method =="VISA"){
		
			$nl_result= $nlcheckout->VisaCheckout($order_code,$total_amount,$payment_type,$order_description,$tax_amount,
											  $fee_shipping,$discount_amount,$return_url,$cancel_url,$buyer_fullname,$buyer_email,$buyer_mobile, 
									          $buyer_address,$array_items,$bank_code);
											  
		}elseif($payment_method =="NL"){
			$nl_result= $nlcheckout->NLCheckout($order_code,$total_amount,$payment_type,$order_description,$tax_amount,
												$fee_shipping,$discount_amount,$return_url,$cancel_url,$buyer_fullname,$buyer_email,$buyer_mobile, 
												$buyer_address,$array_items);
												
		}elseif($payment_method =="ATM_ONLINE" && $bank_code !='' ){
			$nl_result= $nlcheckout->BankCheckout($order_code,$total_amount,$bank_code,$payment_type,$order_description,$tax_amount,
												  $fee_shipping,$discount_amount,$return_url,$cancel_url,$buyer_fullname,$buyer_email,$buyer_mobile, 
												  $buyer_address,$array_items) ;
		}
		elseif($payment_method =="NH_OFFLINE"){
				$nl_result= $nlcheckout->officeBankCheckout($order_code, $total_amount, $bank_code, $payment_type, $order_description, $tax_amount, $fee_shipping, $discount_amount, $return_url, $cancel_url, $buyer_fullname, $buyer_email, $buyer_mobile, $buyer_address, $array_items);
			}
		elseif($payment_method =="ATM_OFFLINE"){
				$nl_result= $nlcheckout->BankOfflineCheckout($order_code, $total_amount, $bank_code, $payment_type, $order_description, $tax_amount, $fee_shipping, $discount_amount, $return_url, $cancel_url, $buyer_fullname, $buyer_email, $buyer_mobile, $buyer_address, $array_items);
				
			}
		elseif($payment_method =="IB_ONLINE"){
				$nl_result= $nlcheckout->IBCheckout($order_code, $total_amount, $bank_code, $payment_type, $order_description, $tax_amount, $fee_shipping, $discount_amount, $return_url, $cancel_url, $buyer_fullname, $buyer_email, $buyer_mobile, $buyer_address, $array_items);
			}
		elseif ($payment_method == "CREDIT_CARD_PREPAID") {

			$nl_result = $nlcheckout->PrepaidVisaCheckout($order_code, $total_amount, $payment_type, $order_description, $tax_amount, $fee_shipping, $discount_amount, $return_url, $cancel_url, $buyer_fullname, $buyer_email, $buyer_mobile, $buyer_address, $array_items, $bank_code);
		}
		//var_dump($nl_result); die;
		if ($nl_result->error_code =='00'){
		
		//Cập nhât order với token  $nl_result->token để sử dụng check hoàn thành sau này
		?>
		<script type="text/javascript">
		<!--
		window.location = "<?php echo(string)$nl_result->checkout_url; // .'&lang=en' chuyển mặc định tiếng anh  ?>"
		//-->
		</script>
		<?PHP
		}else{
			echo $nl_result->error_message;
		}
			
	}else{
		echo "<h3> Bạn chưa nhập đủ thông tin khách hàng </h3>";
	}
 }				
	
?>
<!--BG-WHITE-->
<div class="bg-white">
<!--BG-WHITE-->
    <!--====================================== Title Checkout ======================================-->
    <div class="container-fluid Title_bg">
        <div>
            <div class="Display-noneX" style="height: 5.5em"><span></span></div>
            <div style="height: 5em"><span></span></div>

            <div class="checkout-bg text-center">
                <h1 class="Font-white">Checkout</h1>
                <ul class="breadcrumb-List">
                    <li><a href="{{ route('home',App()->getLocale()) }}"><span>Home</span></a></li>
                    <li><span class="none-color">Checkout</span></li>
                </ul>
            </div>

            <div style="height: 5em"><span></span></div>
            <div class="Display-noneX" style="height: 5.8em"><span></span></div>
        </div>
    </div><!-- /.sc_content -->
    <!--====================================== END Title Checkout ======================================-->
    <!--====================================== Empty Space ======================================-->
    <div style="height: 7.5em"><span></span></div>
    <!--====================================== END Empty Space ======================================-->
    <!--====================================== Box-Checking ======================================-->
    <div class="container">
        <div class="row">
          @if(Route::has('login'))
            @guest
            <div class="col-12 bg-Box border-top-Box box-title">
                <p><i class="fa fa-window-maximize" aria-hidden="true"></i> Returning customer? <a href="{{route('login')}}"><span>Click here to login</span></a></p>
            </div>
            @endguest
          @endif
          @if(!session()->has('coupon'))
            <div class="col-12 bg-Box border-top-Box box-title">
                <p><i class="fa fa-window-maximize" aria-hidden="true"></i> Have a coupon? <a href="{{route('cart.index')}}"><span>Click here to enter your code</span></a></p>
            </div>
          @endif
        </div>
    </div>
    <!--====================================== END Box-Checking ======================================-->
    <!--====================================== Buyed ======================================-->
<div class="container">
    <div class="row">
        <div class="col-xl-12 col-md-12 col-sm-12 no-pdd-buyed">
            <form action="" method="POST">
            @csrf
                <div class="col-xl-12 col-md-12 col-sm-12 no-pdd-buyed">
                    <h4 class="mb-3">{{__('checkout.Bill')}}</h4>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="firstName">{{__('checkout.name')}}</label>
                            <input type="text" class="form-control Fix-input-checkout Fix-high-checkout" 
                            name="buyer_fullname" id="buyer_fullname" placeholder="{{__('checkout.name')}}" value=" @if (Auth::check()) {{Auth::user()->name}} @endif " required>
                        </div>

                    </div>
                    <div class="mb-3">
                        <label for="Phone">{{__('checkout.address')}}</label>
                            <input type="text" class="form-control Fix-input-checkout Fix-high-checkout" 
                            name="buyer_address" id="buyer_address" placeholder="{{__('checkout.address')}}" value="@if (Auth::check()) {{Auth::user()->address}} @endif" required>
                    </div>
                    <div class="mb-3">
                      <label for="Phone">{{__('checkout.phone')}}</label>
                          <input type="number" class="form-control Fix-input-checkout Fix-high-checkout" 
                          name="buyer_mobile" id="buyer_mobile" placeholder="{{__('checkout.phone')}}" value="@if (Auth::check()) {{Auth::user()->phone}} @endif" required>
                    </div>
                    <div class="mb-3">
                        <label for="Emailaddress">{{__('checkout.email')}}</label>
                            <input type="email" class="form-control Fix-input-checkout Fix-high-checkout" 
                            name="buyer_email" id="buyer_email" placeholder="{{__('checkout.email')}}" value="@if (Auth::check()) {{Auth::user()->email}} @endif" required>
                    </div>
                </div>
                <h4 class="mb-3">{{__('checkout.payment')}}</h4>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label>{{__('checkout.methods')}} : </label><br>
                            <label><input type="radio" id="rdoCash" name="paymentMethod" value="CASH" checked> Thanh toán bằng tiền mặt</label> <br>
                            <label><input type="radio" id="rdoNL"   name="paymentMethod" value="NL"  > Thanh toán qua TK ngân lượng</label> <br>
                            <div id="nganluongContent" class="boxContent" style="border: 2px #333 solid;border-radius:5px;display:none">
                                <p style="padding: 20px">
                                    Thanh toán trực tuyến AN TOÀN và ĐƯỢC BẢO VỆ, sử dụng thẻ ngân hàng trong và ngoài nước hoặc nhiều hình thức tiện lợi khác.
                                    Được bảo hộ & cấp phép bởi NGÂN HÀNG NHÀ NƯỚC, ví điện tử duy nhất được cộng đồng ƯA THÍCH NHẤT 2 năm liên tiếp, Bộ Thông tin Truyền thông trao giải thưởng Sao Khuê
                                    <br/>Giao dịch. Đăng ký ví NgânLượng.vn miễn phí <a href="https://www.nganluong.vn/?portal=nganluong&amp;page=user_register" target="_blank">tại đây</a>
                                </p>
                            </div>
                            <label><input type="radio" id="rdoBank" name="paymentMethod" value="ATM_ONLINE"  > Thanh toán qua thẻ ngân hàng</label> <br>
                            <div id="bankContent" class="boxContent" style="border: 2px #333 solid;border-radius:5px;display:none">
                                <p style="padding: 20px">Danh sách ngân hàng : </p>
                                
                                <ul class="cardList clearfix">
                                    <li class="bank-online-methods ">
                                        <label for="vcb_ck_on">
                                            <i class="BIDV" title="Ngân hàng TMCP Đầu tư &amp; Phát triển Việt Nam"></i>
                                            <input type="radio" value="BIDV"  name="bankcode" >
                                        
                                    </label></li>
                                    <li class="bank-online-methods ">
                                        <label for="vcb_ck_on">
                                            <i class="VCB" title="Ngân hàng TMCP Ngoại Thương Việt Nam"></i>
                                            <input type="radio" value="VCB"  name="bankcode" >
                                        
                                    </label></li>
            
                                    <li class="bank-online-methods ">
                                        <label for="vnbc_ck_on">
                                            <i class="DAB" title="Ngân hàng Đông Á"></i>
                                            <input type="radio" value="DAB"  name="bankcode" >
                                        
                                    </label></li>
            
                                    <li class="bank-online-methods ">
                                        <label for="tcb_ck_on">
                                            <i class="TCB" title="Ngân hàng Kỹ Thương"></i>
                                            <input type="radio" value="TCB"  name="bankcode" >
                                        
                                    </label></li>
            
                                    <li class="bank-online-methods ">
                                        <label for="sml_atm_mb_ck_on">
                                            <i class="MB" title="Ngân hàng Quân Đội"></i>
                                            <input type="radio" value="MB"  name="bankcode" >
                                        
                                    </label></li>
            
                                    <li class="bank-online-methods ">
                                        <label for="sml_atm_vib_ck_on">
                                            <i class="VIB" title="Ngân hàng Quốc tế"></i>
                                            <input type="radio" value="VIB"  name="bankcode" >
                                        
                                    </label></li>
            
                                    <li class="bank-online-methods ">
                                        <label for="sml_atm_vtb_ck_on">
                                            <i class="ICB" title="Ngân hàng Công Thương Việt Nam"></i>
                                            <input type="radio" value="ICB"  name="bankcode" >
                                        
                                    </label></li>
            
                                    <li class="bank-online-methods ">
                                        <label for="sml_atm_exb_ck_on">
                                            <i class="EXB" title="Ngân hàng Xuất Nhập Khẩu"></i>
                                            <input type="radio" value="EXB"  name="bankcode" >
                                        
                                    </label></li>
            
                                    <li class="bank-online-methods ">
                                        <label for="sml_atm_acb_ck_on">
                                            <i class="ACB" title="Ngân hàng Á Châu"></i>
                                            <input type="radio" value="ACB"  name="bankcode" >
                                        
                                    </label></li>
            
                                    <li class="bank-online-methods ">
                                        <label for="sml_atm_hdb_ck_on">
                                            <i class="HDB" title="Ngân hàng Phát triển Nhà TPHCM"></i>
                                            <input type="radio" value="HDB"  name="bankcode" >
                                        
                                    </label></li>
            
                                    <li class="bank-online-methods ">
                                        <label for="sml_atm_msb_ck_on">
                                            <i class="MSB" title="Ngân hàng Hàng Hải"></i>
                                            <input type="radio" value="MSB"  name="bankcode" >
                                        
                                    </label></li>
            
                                    <li class="bank-online-methods ">
                                        <label for="sml_atm_nvb_ck_on">
                                            <i class="NVB" title="Ngân hàng Nam Việt"></i>
                                            <input type="radio" value="NVB"  name="bankcode" >
                                        
                                    </label></li>
            
                                    <li class="bank-online-methods ">
                                        <label for="sml_atm_vab_ck_on">
                                            <i class="VAB" title="Ngân hàng Việt Á"></i>
                                            <input type="radio" value="VAB"  name="bankcode" >
                                        
                                    </label></li>
            
                                    <li class="bank-online-methods ">
                                        <label for="sml_atm_vpb_ck_on">
                                            <i class="VPB" title="Ngân Hàng Việt Nam Thịnh Vượng"></i>
                                            <input type="radio" value="VPB"  name="bankcode" >
                                        
                                    </label></li>
            
                                    <li class="bank-online-methods ">
                                        <label for="sml_atm_scb_ck_on">
                                            <i class="SCB" title="Ngân hàng Sài Gòn Thương tín"></i>
                                            <input type="radio" value="SCB"  name="bankcode" >
                                        
                                    </label></li>
            
                                    
            
                                    <li class="bank-online-methods ">
                                        <label for="bnt_atm_pgb_ck_on">
                                            <i class="PGB" title="Ngân hàng Xăng dầu Petrolimex"></i>
                                            <input type="radio" value="PGB"  name="bankcode" >
                                        
                                    </label></li>
            
                                    <li class="bank-online-methods ">
                                        <label for="bnt_atm_gpb_ck_on">
                                            <i class="GPB" title="Ngân hàng TMCP Dầu khí Toàn Cầu"></i>
                                            <input type="radio" value="GPB"  name="bankcode" >
                                        
                                    </label></li>
            
                                    <li class="bank-online-methods ">
                                        <label for="bnt_atm_agb_ck_on">
                                            <i class="AGB" title="Ngân hàng Nông nghiệp &amp; Phát triển nông thôn"></i>
                                            <input type="radio" value="AGB"  name="bankcode" >
                                        
                                    </label></li>
            
                                    <li class="bank-online-methods ">
                                        <label for="bnt_atm_sgb_ck_on">
                                            <i class="SGB" title="Ngân hàng Sài Gòn Công Thương"></i>
                                            <input type="radio" value="SGB"  name="bankcode" >
                                        
                                    </label></li>	
                                    <li class="bank-online-methods ">
                                        <label for="sml_atm_bab_ck_on">
                                            <i class="BAB" title="Ngân hàng Bắc Á"></i>
                                            <input type="radio" value="BAB"  name="bankcode" >
                                        
                                    </label></li>
                                    <li class="bank-online-methods ">
                                        <label for="sml_atm_bab_ck_on">
                                            <i class="TPB" title="Tền phong bank"></i>
                                            <input type="radio" value="TPB"  name="bankcode" >
                                        
                                    </label></li>
                                    <li class="bank-online-methods ">
                                        <label for="sml_atm_bab_ck_on">
                                            <i class="NAB" title="Ngân hàng Nam Á"></i>
                                            <input type="radio" value="NAB"  name="bankcode" >
                                        
                                    </label></li>
                                    <li class="bank-online-methods ">
                                        <label for="sml_atm_bab_ck_on">
                                            <i class="SHB" title="Ngân hàng TMCP Sài Gòn - Hà Nội (SHB)"></i>
                                            <input type="radio" value="SHB"  name="bankcode" >
                                        
                                    </label></li>
                                    <li class="bank-online-methods ">
                                        <label for="sml_atm_bab_ck_on">
                                            <i class="OJB" title="Ngân hàng TMCP Đại Dương (OceanBank)"></i>
                                            <input type="radio" value="OJB"  name="bankcode" >
                                        
                                    </label></li> 
                                </ul>
                            </div>
                            <label><input type="radio" id="rdoVisa" name="paymentMethod" value="VISA"  > Thanh toán qua thẻ VISA</label> <br>
                        </div>
                    </div>
                <button class="btn btn-red-checkout float-right" type="submit"><span>Place order</span></button>
            </form>
        </div>
    </div>
<!--====================================== Buyed ======================================-->
<div class="container">
    <div class="row">
        <div class="col-xl-12 col-md-12 col-sm-12 no-pdd-buyed">
            <form class="needs-validation" novalidate>

                <div class="col-xl-12 col-md-12 col-sm-12 no-pdd-buyed">
                    <h4 class="mb-3">{{__('checkout.payment')}}</h4>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="firstName">{{__('checkout.methods')}}</label>
                            <select class="form-control" name="payment_method" id="payment_method" onchange="get_bank()">
                              <option value="ATM_ONLINE">Thanh toán bằng thẻ ATM</option>
                              <option value="IB_ONLINE">Thanh toán bằng tài khoản ngân hàng/Internet Banking</option>
                              <option value="QRCODE">Thanh toán bằng QRCODE</option>
                              <option value="CASH_IN_SHOP">Thanh toán tiền mặt tại quầy</option>
                            </select>
                        </div>
                        <div class="col-md-12 mb-3">
                          <label for="firstName">{{__('checkout.bank')}}</label>
                          <select class="form-control" name="bank_code" id="bank_code">
                          </select>
                      </div>

                    </div>
                    <h4 class="mb-3">{{__('checkout.Bill')}}</h4>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="firstName">{{__('checkout.name')}}</label>
                            <input type="text" class="form-control Fix-input-checkout Fix-high-checkout" 
                            name="buyer_fullname" id="buyer_fullname" placeholder="{{__('checkout.name')}}" value=" @if (Auth::check()) {{Auth::user()->name}} @endif " required>
                            <div class="invalid-feedback">
                                Valid first name is required.
                            </div>
                        </div>

                    </div>
                    <div class="mb-3">
                        <label for="Phone">{{__('checkout.address')}}</label>
                            <input type="text" class="form-control Fix-input-checkout Fix-high-checkout" 
                            name="buyer_address" id="buyer_address" placeholder="{{__('checkout.address')}}" value="@if (Auth::check()) {{Auth::user()->address}} @endif" required>
                        <div class="invalid-feedback">
                            Valid Phone is required.
                        </div>
                    </div>
                    <div class="mb-3">
                      <label for="Phone">{{__('checkout.phone')}}</label>
                          <input type="number" class="form-control Fix-input-checkout Fix-high-checkout" 
                          name="buyer_mobile" id="buyer_mobile" placeholder="{{__('checkout.phone')}}" value="@if (Auth::check()) {{Auth::user()->phone}} @endif" required>
                      <div class="invalid-feedback">
                          Valid Phone is required.
                      </div>
                    </div>
                    <div class="mb-3">
                        <label for="Emailaddress">{{__('checkout.email')}}</label>
                            <input type="email" class="form-control Fix-input-checkout Fix-high-checkout" 
                            name="buyer_email" id="buyer_email" placeholder="{{__('checkout.email')}}" value="" required>
                        <div class="invalid-feedback">
                            Valid Email address is required.
                        </div>
                    </div>
                </div>

                <hr class="mb-4">

                    <h4 class="mb-3">Your order</h4>
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col" class="font-weight-bold">PRODUCT</th>
                            <th scope="col" class="font-weight-bold">TOTAL</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach(Cart::content() as $item)
                          <tr>
                            <td colspan="1">{{$item->name}}  × <span class="font-weight-bold">{{$item->qty}}</span></td>
                            <td colspan="2">{{$item->price(0,",",".")}} vnđ</td>
                          </tr>
                        @endforeach
                        @if($discount > 0)
                          <tr>
                            <td colspan="1" class="text-uppercase text-right font-weight-bold">DISCOUNT</td>
                            <td colspan="2" class="text-uppercase"><span class="font-weight-bold">{{number_format($discount,0,',','.')}} vnđ</span></td>
                          </tr>
                        @endif
                          <tr>
                            <td colspan="1" class="text-uppercase text-right font-weight-bold">SUBTOTAL</td>
                            <td colspan="2" class="text-uppercase">{{number_format($subtotal,0,',','.')}} vnđ</td>
                          </tr>

                        <tr>
                          <td colspan="1" class="text-uppercase text-right font-weight-bold">TAX</td>
                          <td colspan="2" class="text-uppercase"><span class="font-weight-bold">{{number_format($tax,0,',','.')}} vnđ</span></td>
                        </tr>
                          <tr>
                            <td colspan="1" class="text-uppercase text-right font-weight-bold">TOTAL</td>
                            <td colspan="2" class="text-uppercase"><span class="font-weight-bold">{{number_format($total,0,',','.')}} vnđ</span></td>
                          </tr>
                        </tbody>
                    </table>

    <hr class="mb-4">
<!--====================================== END Buyed ======================================-->
<!--====================================== Empty Space ======================================-->
<div style="height: 5.5em"><span></span></div>
<!--====================================== END Empty Space ======================================-->
<!--BG-WHITE-->
</div>
<!--BG-WHITE-->
<script src="https://www.nganluong.vn/webskins/javascripts/jquery_min.js" type="text/javascript"></script>		
<script language="javascript">
$(document).ready(function(){
    $('input[name="paymentMethod"]').click(function(){
        if($(this).val() == 'NL'){
            $('.boxContent').hide();
            $('#nganluongContent').show();
        } else if ($(this).val() == 'ATM_ONLINE'){
            $('.boxContent').hide();
            $('#bankContent').show();
        } else {
            $('.boxContent').hide();
        }
    });
});
</script> 
@endsection
