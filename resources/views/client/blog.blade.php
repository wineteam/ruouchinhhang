@extends('layouts.app')
@section('content')
<div class="container-fluid bg-white">

    <div class="blog-page">
        <!-- Breadcrumb -->
        <div class="banner-page col-lg-12">
          @if(session()->has('message'))
            <p class="title-page">Search for: {{session()->get('message')}}</p>
          @elseif(session()->has('messageBlog2'))
            <p class="title-page">Tag : {{session()->get('messageBlog2')}}</p>
          @elseif(session()->has('messageBlog3'))
            <p class="title-page">Categories : {{session()->get('messageBlog3')}}</p>
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
                            <h1  class="title-blog"><a href="{{route('blog.show',$myblogs->slug)}}">{{$myblogs->title}}{{$myblogs->id}}{{\Illuminate\Support\Str::limit($myblogs->title,5  )}}</a></h1>
                            <a href="{{route('blog.show',$myblogs->slug)}}" class="learn-more">{{__('Learn_more')}}</a>
                        </div>
                    </div>
                  @endforeach

                    <div class="loadmore">
                        <button class="btn-loadMore" id="loadMore">{{__('Load_more')}}</button>
                    </div>
              </div>

              @include('client.blog2')
          </div>
      </div>
      </div>
      {{-- end blogger --}}
</div>

<script src="{{ asset('js/loadmore-blog.js') }}"></script>

@endsection
