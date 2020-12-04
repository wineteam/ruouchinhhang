@extends('admin.layouts.dashboard')
@section('contentAdmin')
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <div class="py-3 row">
       <div class="col-md-4">
        <div class="block-statistical">
          <img src="{{ asset('Images/IconImages/icon-bg.jpg') }}" width="100%" height="auto" alt="" style="overflow: hidden;">
          <div class="link-to-category">
            <img src="{{ asset('Images/IconImages/wine-glass.png') }}" width="10%" alt="" style="z-index: 1000">
            <a href="{{route ('MngProduct.index')}}">{{__('totally')}} {{$productsCount}} {{__('product')}}</a>
          </div>
        </div>
       </div>
       <div class="col-md-4">
        <div class="block-statistical">
          <img src="{{ asset('Images/IconImages/icon-bg.jpg') }}" width="100%" height="auto" alt="" style="overflow: hidden;">
          <div class="link-to-category">
            <img src="{{ asset('Images/IconImages/box.png') }}" width="10%" alt="" style="z-index: 1000">         
            <a href="{{route ('MngOrder.index')}}">{{NULL}} {{__('order')}}</a>
          </div>
        </div>
       </div>
       <div class="col-md-4">
        <div class="block-statistical">
          <img src="{{ asset('Images/IconImages/icon-bg.jpg') }}" width="100%" height="auto" alt="" style="overflow: hidden;">
          <div class="link-to-category">
            <img src="{{ asset('Images/IconImages/account.png') }}" width="10%" alt="" style="z-index: 1000">
            <a href="{{route ('MngUser.index')}}">{{$usersCount}} {{__('accountuser')}}</a>
          </div>
        </div>
       </div>
    </div>

    <div class="py-3 row">
      <div class="col-md-4">
       <div class="block-statistical">
         <img src="{{ asset('Images/IconImages/icon-bg.jpg') }}" width="100%" height="auto" alt="" style="overflow: hidden;">
         <div class="link-to-category">
          <img src="{{ asset('Images/IconImages/blog.png') }}" width="10%" alt="" style="z-index: 1000">             
           <a href="{{route ('MngBlog.index')}}">{{__('totally')}} {{$blogsCount}} {{__('BLOG')}}</a>
         </div>
       </div>
      </div>
      <div class="col-md-4">
       <div class="block-statistical">
         <img src="{{ asset('Images/IconImages/icon-bg.jpg') }}" width="100%" height="auto" alt="" style="overflow: hidden;">
         <div class="link-to-category">
          <img src="{{ asset('Images/IconImages/comment.png') }}" width="10%" alt="" style="z-index: 1000">         
           <a href="{{route ('MngComment.index')}}">{{NULL}} {{__('comment')}} / {{__('reviews')}}</a>
         </div>
       </div>
      </div>
      <div class="col-md-4">
       <div class="block-statistical">
         <img src="{{ asset('Images/IconImages/icon-bg.jpg') }}" width="100%" height="auto" alt="" style="overflow: hidden;">
         <div class="link-to-category">
          <img src="{{ asset('Images/IconImages/catelog.png') }}" width="10%" alt="" style="z-index: 1000">
         <a href="{{ route ('dashboard.index') }}">{{$categoriesCount}} {{__('catelog')}}</a>
         </div>
       </div>
      </div>
   </div>

    <hr style=" height: 1px;
    background-color: #e84393;
    border: none;">
    <div class="row">       
      <div class="col-md-6">
        <div class="rank-post">
            <h3 class="mb-5" style="border-bottom:3px solid #00b894">{{__('topposts')}}</h3>
            <div class="ScrollListPosts">
              @foreach ($blogViews as $Rblogs)
                <div class="block-rank-post">
                  <h4 class="title"><a href="{{route('blog.show',$Rblogs->slug)}}">{{$Rblogs->title}}</a>
                  </h4>
                  <i class="mr-4">{{\Carbon\Carbon::parse( $Rblogs->day_up)->format('d/m/Y')}}</i>
                  <i class="fas fa-eye"></i> {{$Rblogs->view}}
                </div>  
              @endforeach   
            </div>         
        </div>
      </div>
      <div class="col-md-6">
        <div class="total-income" >
          <h3 class="mb-5" style="border-bottom:3px solid #ff7675">{{__('allmoney')}}</h3>
          <div class="block-total-cost">
            <i class="fas fa-coins" style="font-size: 84px; color: #fbc531;"></i>
           <p style="font-size: 54px;"> {{NULL}} </p>
          </div>
      </div>
      </div>
    </div>
  </section>
</section>
<!--main content end-->    
@endsection