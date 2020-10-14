@extends('layouts.app')
@section('content')
<!--======================================  CONTACT ======================================-->
    <div class="contact-page">
        <div class="contact  bg-white">
            <div class="container-fluid">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 my-auto">
                            <h1 class="text-center">Contact</h1>
                            <div class="text-center item_descr">
                                <span>Home / <span>Contacts</span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="vc_empty_space" style="padding: 0 0 4.1em;"><span class="vc_empty_space_inner"></span></div>
        
            <div class="map">
                <div class="col-sm-12 nopadding">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2770.76689176222!2d106.62898165919992!3d10.852871199767703!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317529e76ef4ac4d%3A0x30d6a9932e802efe!2sFPT%20Polytechnic%20HCM%20-%20C%C6%A1%20s%E1%BB%9F%203!5e0!3m2!1svi!2s!4v1601211056224!5m2!1svi!2s" 
                width="100%" height="600px" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
            </div>
            <div class="vc_empty_space bg-white" style="padding: 0 0 4.1em;"><span class="vc_empty_space_inner"></span></div>
        
            <div class="container">           
                        <div class="col-sm-12 my-auto">
                            <h6 class="text-center Font-Red item_subtitle">Send a Message</h6>
                            <h1 class="text-center">Get in Touch</h1>
                        </div>
                    <div class="block-contact col-12">
                        <form class="form-contact"> 
                            <div class="group-1">
                                <input type="text" name="name" placeholder="Name*">
                                <input type="text" name="email" placeholder="Email*">
                            </div> 
                            <textarea name="message" rows="5" placeholder="Message*"></textarea>
                            <div class="form-check">
                                <input class="form-check-input"  onclick="checkedbox()" type="checkbox" id="CheckApply">
                                <label class="form-check-label" for="CheckApply">
                                    I agree that my submitted data is being collected and stored.
                                </label>
                            </div>
                           <div class="button-submit">
                            <button id="sendmessage" type="submit" class="btn btn-danger">Send Message</button>
                           </div>
                        </form>
                    </div>
                    
                    
                </div>
            </div>
            <div class="vc_empty_space bg-white" style="padding: 0 0 4.1em;"><span class="vc_empty_space_inner"></span></div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            var checkbox = $("#checkApply").val();
            if(checkbox == "on"){
                $('#sendmessage').attr("disabled",true)
                
            }

            function checkedbox(){
               var checkbox = document.getElementById("myCheck");
               if(checkbox == true){
                $('#sendmessage').attr("disabled",false)
               }else{
                $('#sendmessage').attr("disabled",true)
               }
            }
        })
    </script>
@endsection