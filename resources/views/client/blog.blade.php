@extends('layouts.app')
@section('content')
<div class="blog-page">
  <!-- Breadcrumb -->
  <div class="banner-page col-lg-12">
      <p class="title-page">All Posts</p>
      <ul class="breadcrumb-page">
          <li><a href="#">Home</a></li>
          <li aria-current="page">Blog</li>
      </ul>
  </div>
  <!-- Content blogger -->
  <div class="container">
      <div class="row">
          <div class="col-lg-9 pr-lg-5 p-1">
              <!-- block blog -->
              <div class="blog-block">
                  <div class="thumbnail-blogger">                    
                      <img src="images/blogger/image-1-639x534.jpg" alt="">
                      <div class="mark"></div>
                      <a href="#" aria-hidden="true" class="icons">
                          <span></span>
                          <span></span>
                          <span></span>
                      </a>
                  </div>
                  <div class="detail-blogger">
                      <p>28 <span>september</span></p>
                      <h1  class="title-blog"><a href="#">Winemaking - Art, Science, Magic or Technology</a></h1>
                      <a href="#" class="learn-more">Learn more</a>
                  </div>
              </div>
              <div class="blog-block">
                  <div class="thumbnail-blogger">                    
                      <img src="images/blogger/image-2-639x534.jpg" alt="">
                      <div class="mark"></div>
                      <a href="#" aria-hidden="true" class="icons">
                          <span></span>
                          <span></span>
                          <span></span>
                      </a>
                  </div>
                  <div class="detail-blogger">
                      <p>28 <span>september</span></p>
                      <h1  class="title-blog"><a href="#">Winemaking - Art, Science, Magic or Technology</a></h1>
                      <a href="#" class="learn-more">Learn more</a>
                  </div>
              </div>
              <div class="blog-block">
                  <div class="thumbnail-blogger">                    
                      <img src="images/blogger/image-3-639x534.jpg" alt="">
                      <div class="mark"></div>
                      <a href="#" aria-hidden="true" class="icons">
                          <span></span>
                          <span></span>
                          <span></span>
                      </a>
                  </div>
                  <div class="detail-blogger">
                      <p>28 <span>september</span></p>
                      <h1  class="title-blog"><a href="#">Winemaking - Art, Science, Magic or Technology</a></h1>
                      <a href="#" class="learn-more">Learn more</a>
                  </div>
              </div>
              <div class="blog-block">
                  <div class="thumbnail-blogger">                    
                      <img src="images/blogger/image-4-639x534.jpg" alt="">
                      <div class="mark"></div>
                      <a href="#" aria-hidden="true" class="icons">
                          <span></span>
                          <span></span>
                          <span></span>
                      </a>
                  </div>
                  <div class="detail-blogger">
                      <p>28 <span>september</span></p>
                      <h1  class="title-blog"><a href="#">Winemaking - Art, Science, Magic or Technology</a></h1>
                      <a href="#" class="learn-more">Learn more</a>
                  </div>
              </div>

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
                  
              </div>

              <div class="categories" style="margin-bottom: 100px;">
                  <h5 style="margin-bottom: 40px;">Categories</h5>
                  <ul class="categories-menu">
                      <li class="cat-item"><i class="demo-icon icon-wine"></i><a href="#">Buying Guide</a></li>
                      <li class="cat-item"><i class="demo-icon icon-wine"></i><a href="#">Catalogue</a></li>
                      <li class="cat-item"><i class="demo-icon icon-wine"></i><a href="#">Food</a></li>              
                  </ul>
              </div>
              <div class="tags" style="margin-bottom: 100px;">
                  <h5 style="margin-bottom: 40px;">Tags</h5>
                  <div class="tagclound">
                      <a href="#">Brand</a>
                      <a href="#">Cabernet</a>
                      <a href="#">Festival</a>
                      <a href="#">Food</a>
                      <a href="#">Wine</a>
                  </div>
              </div>
          </div>
    </div>
</div>
</div>
{{-- end blogger --}}

@endsection