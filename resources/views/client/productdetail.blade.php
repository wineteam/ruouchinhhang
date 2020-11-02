@extends('layouts.app')
@section('content')
<div class="product-page">
   <!-- Breadcrumb -->
  <div class="banner-page col-lg-12">
    <p class="title-page">Cabernet Sauvignon Reserve</p>
    <ul class="breadcrumb-page">
        <li><a href="{{ route('home',app()->getLocale()) }}">Home</a></li>
        <li aria-current="page"><a href="{{ route('home',app()->getLocale()) }}">Shop</a></li>
        <li aria-current="page"><a href="">New Arrivals</a></li>
        <li aria-current="page">Cabernet Sauvignon Reserve</li>
    </ul>
  </div>

<div class="bg-white pt-5 pb-5">
<div class="container">
<div class="row">
  
<div class=" col-xl-9 col-md-12 col-sm-12">
    <div class="row">
        <div class="col-xl-6 pt-4 pb-3">
            <div class="box-images-productDetail">
                <img class="rounded mx-auto d-block" style="margin-bottom: 1rem;" width="60%" height="auto" src="{{ asset('images/product-1.png') }}" alt="">
            </div>
        </div>
        <div class="col-xl-6">
            <h4 class="pt-4 pb-3 Font-Red">£26000 – £34000</h4>
            <p>
                White wine is a wine whose color can be straw-yellow, 
                yellow-green, or yellow-gold coloured. It is produced 
                by the alcoholic fermentation of the non-colored pulp 
                of grapes which may have a white or black skin. It is 
                treated so as to maintain a yellow transparent color.
            </p>
            <br>
            <span class="Option-PDetail">Size</span>
            <select class="mdb-select md-form option-select" style="width: 80%">
                <option value="" disabled selected>Choose an option</option>
                <option value="1">Option 1</option>
                <option value="2">Option 2</option>
            </select>
            <br><br>
            <span class="Option-PDetail2">Vintage</span>
            <select class="mdb-select md-form option-select" style="width: 80%">
                <option value="" disabled selected>Choose an option</option>
                <option value="1">Option 1</option>
                <option value="2">Option 2</option>
            </select>
            <br><br>

              <div class="quantity">
                 <input class="Buyed-PDetail" type="number" min="1" max="100" step="1" value="1">
              </div>
              <script src="{{ asset('js/number.js') }}"></script>

            <br><br><br>
            <a href=""class="btn-subtitle PDetail-BuyNow"><span class=""><span class="">Buy Now</span></span></a>
            <br><br><br><br>
            <p>SKU: 7648</p>
            <p>Categories: <a href="" class="Font-Red">New Arrivals</a>, <a href="" class="Font-Red">White Wines</a></p>
            <p>Tags: <a href="" class="Font-Red">white</a>, <a href="" class="Font-Red">wine</a></p>
            <p>Product ID: 437</p>
        </div>
        
        <div class="col-xl-12" style="margin-top: 50px;">
            <nav>
                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                  <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Description</a>
                  <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Additional information</a>
                  <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Reviews (0)</a>
                </div>
            </nav>

            <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <p class="Content-PDetails">
                        But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will 
                        give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, 
                        the master-builder of human happiness. No one re.
                    </p>
                </div>

                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                  
                    <div class="box-infomation-PDetail">
                        <h4 class="mb-3">Additional information</h4>
                        <table class="table table-bordered">
                            <tbody>
                            <tr class="col-3">
                                <td colspan="1" class="font-weight-bold">Size</td>
                                <td colspan="2">500ml, 750ml</td>
                            </tr>
                            <tr class="col-9">
                                <td colspan="1" class="font-weight-bold">Vintage</td>
                                <td colspan="2">2012, 2014</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                </div>

                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                    <div class="box-infomation-PDetail">
                        <h4 class="mb-3">Reviews</h4>
                        
                        <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <img src="{{ asset('images/promo-3.webp') }}" class="avatar img-circle img-thumbnail"/>
                                    <p class="text-secondary text-center">15 Minutes Ago</p>
                                </div>
                                <div class="col-md-10">
                                    <p>
                                        <a class="float-left" href=""><strong>Maniruzzaman Akash</strong></a>
                                        <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                        <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                        <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                        <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                        <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                    </p>
                                    <div class="clearfix"></div>
                                    <p>
                                        Lorem Ipsum is simply dummy text of the pr make  but also the 
                                        leap into electronic typesetting, remaining essentially unchanged. 
                                        It was popularised in the 1960s with the release of Letraset sheets 
                                        containing Lorem Ipsum passages, and more recently with desktop publishing 
                                        software like Aldus PageMaker including versions of Lorem Ipsum.
                                    </p>
                                </div>
                            </div>
                        </div>
                        </div>
                        <hr><br>

                        <p>There are no reviews yet.</p>
                        <hr><br>
                        <p>Be the first to review “Cabernet Sauvignon Reserve”</p>
                        <p class="font-italic">Your email address will not be published. Required fields are marked *</p>
                        
                        <form action="">

                            <div class="stars">
                                <span>Your rating</span>
                                    <form action="">
                                      <input class="star star-5" id="star-5" type="radio" name="star"/>
                                      <label class="star star-5" for="star-5"></label>
                                      <input class="star star-4" id="star-4" type="radio" name="star"/>
                                      <label class="star star-4" for="star-4"></label>
                                      <input class="star star-3" id="star-3" type="radio" name="star"/>
                                      <label class="star star-3" for="star-3"></label>
                                      <input class="star star-2" id="star-2" type="radio" name="star"/>
                                      <label class="star star-2" for="star-2"></label>
                                      <input class="star star-1" id="star-1" type="radio" name="star"/>
                                      <label class="star star-1" for="star-1"></label>
                                    </form>
                                </div>
        
                                <p>Your review *</p>
                                <textarea class="form-control Fix-input-checkout" id="exampleFormControlTextarea1" rows="3" required></textarea>
        
                                <br>
        
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="firstName">Name</label>
                                        <input type="text" class="form-control Fix-input-checkout Fix-high-checkout" id="firstName" placeholder="" value="" required>
                                        <div class="invalid-feedback">
                                        Valid Name is required.
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="lastName">Email</label>
                                        <input type="email" class="form-control Fix-input-checkout Fix-high-checkout" id="lastName" placeholder="" value="" required>
                                        <div class="invalid-feedback">
                                        Valid Email is required.
                                        </div>
                                    </div>
                                </div>
        
                                <button class="btn btn-red-checkout" type="submit"><span style="font-size: 13pt">Submit</span></button>

                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
<!--====================================== Empty Space ======================================-->
<div class="vc_empty_space" style="height: 5.5em"><span class="vc_empty_space_inner"></span></div>
<!--====================================== END Empty Space ======================================-->
    <h3>Related products</h3><br>
    <div class="row">
        <div class="col-xl-4 col-md-4 col-sm-6 text-center productItem mb-4 Fix-product-pdd">
            <div class="productItem__content">
            <img class="" style="margin-bottom: 1rem;" width="100%" height="auto" src="{{ asset('images/product-1.png') }}" alt="">
            <p>White, Wine</p>
            <h4>2014 California Red</h4>
            <p>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
            </p>
            <p>£200.00 – £230.00</p>
            <button><i class="fa fa-shopping-bag"></i> Buy now</button>
        </div>
        </div>

        <div class="col-xl-4 col-md-4 col-sm-6 text-center productItem mb-4 Fix-product-pdd">
            <div class="productItem__content">
            <img class="" style="margin-bottom: 1rem;" width="100%" height="auto" src="{{ asset('images/product-2.png') }}" alt="">
            <p>White, Wine</p>
            <h4>2014 California Red</h4>
            <p>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
            </p>
            <p>£200.00 – £230.00</p>
            <button><i class="fa fa-shopping-bag"></i> Buy now</button>
        </div>
        </div>
        
        <div class="col-xl-4 col-md-4 col-sm-6 text-center productItem mb-4 Fix-product-pdd">
            <div class="productItem__content">
            <img class="" style="margin-bottom: 1rem;" width="100%" height="auto" src="{{ asset('images/product-3.png') }}" alt="">
            <p>White, Wine</p>
            <h4>2014 California Red</h4>
            <p>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
            </p>
            <p>£200.00 – £230.00</p>
            <button><i class="fa fa-shopping-bag"></i> Buy now</button>
        </div>
        </div>
    </div>
</div>
  
  <div class="col-xl-3 col-md-12 col-sm-12 px-3">
    <div class="row productCategories">
      <div class="col-xl-12 col-md-6 col-sm-12">
        <h4 class="pt-4 pb-3">Product Categories</h4>
        <div class="productCategories__list pl-2 mb-5">
          <a href="#"><i class="fa fa-angle-right"></i>  New Arrivals</a>
          <a href="#"><i class="fa fa-angle-right"></i>  Red Wines</a>
          <a href="#"><i class="fa fa-angle-right"></i>  Rose Wines</a>
          <a href="#"><i class="fa fa-angle-right"></i>  Sparkling</a>
          <a href="#"><i class="fa fa-angle-right"></i>  White Wines</a>
          <a href="#"><i class="fa fa-angle-right"></i>  Uncategorized</a>
        </div>
      </div>

      <div class="col-xl-12 col-md-6 col-sm-12">
        <h4 class="pt-4 pb-3">Filter by price</h4>
        <div class="form-group">
          <input type="range" class="form-control-range" id="formControlRange" min="155" max="365" value="255">
        </div>
        <button class="btn btn-dark">Fillter</button>
        <span class="ml-5 " style="font-size: 15px; color: #c2c0b0;">Price: £155 — £<span id="numberFillter">365</span></span>
      </div>
      <div class="col-xl-12 col-md-6 col-sm-12">
        <h4 class="pt-4 pb-3 mt-5">Product</h4>
        <div class="productList p-3">
          <div class="row">
            <div class="col-4 text-center productList__item">
              <img src="{{ asset('images/product-1.png') }}" alt="" >
            </div>
            <div class="col-8">
              <h6 class="mb-3" style="font-size: 14px;">California Red Wine</h6> 
              <h6 style="color: #da3f19; font-size: 14px;">£300.00 – £365.00</h6>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-4 text-center productList__item">
              <img src="{{ asset('images/product-1.png') }}" alt="" >
            </div>
            <div class="col-8">
              <h6 class="mb-3" style="font-size: 14px;">California Red Wine</h6> 
              <h6 style="color: #da3f19; font-size: 14px;">£300.00 – £365.00</h6>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-4 text-center productList__item">
              <img src="{{ asset('images/product-1.png') }}" alt="" >
            </div>
            <div class="col-8">
              <p class="mb-3" style="font-size: 14px;">California Red Wine</p> 
              <p style="color: #da3f19; font-size: 14px;">£300.00 – £365.00</p>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-4 text-center productList__item">
              <img src="{{ asset('images/product-1.png') }}" alt="" >
            </div>
            <div class="col-8">
              <h6 class="mb-3" style="font-size: 14px;">California Red Wine</h6> 
              <h6 style="color: #da3f19; font-size: 14px;">£300.00 – £365.00</h6>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-12 col-md-6 col-sm-12">
        <h4 class="pt-4 pb-3 mt-5">Tags</h4>
        <div class="tagList">
          <p>
          <span>new arrival</span>
          <span>red</span>
          <div class="List-editor"></div>
          <span>sparkling</span>
          <span>vintage</span>
          <div class="List-editor"></div>
          <span>white</span>
          <span>wine</span>
        </p>
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