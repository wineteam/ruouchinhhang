@extends('layouts.app')
@section('content')

<div class="container-fluid bg-white">

    <div class="blog-page">
        <!-- Breadcrumb -->
        <div class="banner-page col-lg-12">
            <p class="title-page">{{$blog->title}}</p>
            <ul class="breadcrumb-page">
                <li><a  href="{{ route('home',app()->getLocale()) }}">{{__('HOME')}}</a></li>
                <li><a href="{{route('blog.index')}}">{{__('Blog')}}</a></li>
            </ul>
        </div>
        <!-- Content blogger -->
      <div class="container">
          <div class="row">

              <!-- Post Content Column -->
              <div class="col-lg-9 pr-lg-5 p-1">

                <!-- Title -->
                <h1 class="mt-4">{{$blog->title}}</h1>

                <!-- Author -->
                <p class="lead">
                  by
                  <a href="#">
                    {{$blog->user()->name}}
                  </a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p>Posted on {{\Carbon\Carbon::parse( $blog->day_up)->format('d/m/Y')}}</p>

                <hr>

                <!-- Preview Image -->
                <img class="img-fluid mx-auto d-block" width="100%" height="auto" src="{{$blog->thumbnail}}" alt="">

                <hr>

                <!-- Post Content -->
                <p class="lead">{{$blog->description}}</p>

                <p>{{$blog->content}}</p>

                <hr>

                <!-- Comments Form -->
                <div class="card my-4">
                  <h5 class="card-header">Leave a Comment:</h5>
                  <div class="card-body">
                    <form>
                      <div class="form-group">
                        <textarea class="form-control" rows="3"></textarea>
                      </div>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                  </div>
                </div>

                <!-- Single Comment -->
                <div class="media mb-4">
                  <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                  <div class="media-body">
                    <h5 class="mt-0">Commenter Name</h5>
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                  </div>
                </div>

                <!-- Comment with nested comments -->
                <div class="media mb-4">
                  <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                  <div class="media-body">
                    <h5 class="mt-0">Commenter Name</h5>
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

                    <div class="media mt-4">
                      <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                      <div class="media-body">
                        <h5 class="mt-0">Commenter Name</h5>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                      </div>
                    </div>

                    <div class="media mt-4">
                      <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                      <div class="media-body">
                        <h5 class="mt-0">Commenter Name</h5>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                      </div>
                    </div>

                  </div>
                </div>

              </div>

              <!-- Sidebar Widgets Column -->
              @include('client.blog2')

            </div>
            <!-- /.row -->



          </div>
      </div>
      </div>
      {{-- end blogger --}}

</div>

@endsection
