@extends('layouts.app')
@section('content')
<<<<<<< HEAD
<div class="container-fluid bg-white">

<<<<<<< HEAD
=======
>>>>>>> hoaianh-client
    <div class="blog-page">
        <!-- Breadcrumb -->
        <div class="banner-page col-lg-12">
          @if(isset($message))
            <p class="title-page text-capitalize">{{$message}}</p>
          @else
            <p class="title-page">{{__('ALL')}} {{__('POST')}}</p>
          @endif
            <ul class="breadcrumb-page">
                <li><a  href="{{ route('home',app()->getLocale()) }}">{{__('HOME')}}</a></li>
                <li aria-current="page">{{__('BLOG')}}</li>
            </ul>
        </div>
        <!-- Content blogger -->
        <div class="container">
            <div class="row">
              <div class="col-lg-9 pr-lg-5 p-1">
=======
              <div class="loadmore">
                  <button class="btn-loadMore">Load More</button>
              </div>
          </div>
          <div class="col-lg-3 d-none d-lg-block p-1">
              <div class="search" style="margin-bottom: 100px;">
                  <h5 style="margin-bottom: 40px;">Search</h5>
                  <form action="" class="form-search">
                      <input type="text" name="searching" placeholder="Search...">
                      <button type="submit"><i class="fa fa-search"></i></button>
                  </form>
              </div>
              <div class="recent-post" style="margin-bottom: 100px;">
                  <h5 style="margin-bottom: 40px;">Recent Posts</h5>
                  <div class="block-recent-post">
                      <div class="recent-post-thumb">
                          <a href="#">
                              <img src="images/blogger/image-1-639x534.jpg" width="100%" height="auto"  alt="">
                          </a>
                      </div>
                      <div class="recent-post-content px-3">
                          <h6 class="recent-post-title">
                              <a href="#">Winemaking - Art, Science, Magic or Technology</a>
                          </h6>
                          <div class="post-info">
                              <p style="color: #BDB68E;font-size: 13px;">September 30 9, 2020</p>
                          </div>
                      </div>
                  </div>
                  <div class="block-recent-post">
                      <div class="recent-post-thumb">
                          <a href="#">
                              <img src="images/blogger/image-2-639x534.jpg" width="100%" height="auto"  alt="">
                          </a>
                      </div>
                      <div class="recent-post-content px-3">
                          <h6 class="recent-post-title">
                              <a href="#">Winemaking - Art, Science, Magic or Technology</a>
                          </h6>
                          <div class="post-info">
                              <p style="color: #BDB68E;font-size: 13px;">September 30 9, 2020</p>
                          </div>
                      </div>
                  </div>
                  <div class="block-recent-post">
                      <div class="recent-post-thumb">
                          <a href="#">
                              <img src="images/blogger/image-3-639x534.jpg" width="100%" height="auto"  alt="">
                          </a>
                      </div>
                      <div class="recent-post-content px-3">
                          <h6 class="recent-post-title">
                              <a href="#">Winemaking - Art, Science, Magic or Technology</a>
                          </h6>
                          <div class="post-info">
                              <p style="color: #BDB68E;font-size: 13px;">September 30 9, 2020</p>
                          </div>
                      </div>
                  </div>
                  <div class="block-recent-post">
                      <div class="recent-post-thumb">
                          <a href="#">
                              <img src="images/blogger/image-4-639x534.jpg" width="100%" height="auto"  alt="">
                          </a>
                      </div>
                      <div class="recent-post-content px-3">
                          <h6 class="recent-post-title">
                              <a href="#">Winemaking - Art, Science, Magic or Technology</a>
                          </h6>
                          <div class="post-info">
                              <p style="color: #BDB68E;font-size: 13px;">September 30 9, 2020</p>
                          </div>
                      </div>
                  </div>
>>>>>>> 7e43e3be61f75db1b48ac984824911d95937a482

                  @foreach($blogs as $myblogs)
                    <!-- block blog -->
                    <div class="blog-block Blogs-Limit" style="display: none">
                        <div class="thumbnail-blogger">
                            <img src="{{$myblogs->thumbnail}}" alt="">
                            <div class="mark"></div>
                            <a href="{{route('blog.show',$myblogs->slug)}}" aria-hidden="true" class="icons">
                                <span></span>
                                <span></span>
                                <span></span>
                            </a>
                        </div>
                        <div class="detail-blogger">
                            <p>{{\Carbon\Carbon::parse( $myblogs->day_up)->format('d/m/Y')}} <span>september</span></p>
<<<<<<< HEAD
                            <h1  class="title-blog"><a href="{{route('blog.show',$myblogs->slug)}}">{{$myblogs->title}}{{$myblogs->id}}{{\Illuminate\Support\Str::limit($myblogs->title,5  )}}</a></h1>
                            <a href="{{route('blog.show',$myblogs->slug)}}" class="learn-more">{{__('Learn_more')}}</a>
=======
                            <h1  class="title-blog"><a href="{{route('blog.show',$myblogs->slug)}}">{{$myblogs->id}}{{\Illuminate\Support\Str::limit($myblogs->title,100  )}}</a></h1>
                            <a href="{{route('blog.show',$myblogs->slug)}}" class="learn-more">Learn more</a>
>>>>>>> hoaianh-client
                        </div>
                    </div>
                  @endforeach
                    @if(count($blogs) > 4)
                    <div class="loadmore">
                        <button class="btn-loadMore" id="loadMore">{{__('Load_more')}}</button>
                    </div>
                    @elseif(count($blogs) == 0)
                      <h2 class="text-danger text-center">Nothing</h2>
                    @endif
              </div>

              @include('client.blog2')
          </div>
      </div>
      </div>
      {{-- end blogger --}}


<script src="{{ asset('js/loadmore-blog.js') }}"></script>

@endsection
